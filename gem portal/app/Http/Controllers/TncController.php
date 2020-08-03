<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Access;
use App\Tnc;
use Auth;
use DataTables;
use App\User;

use OneSignal;

// use Input;
// use Input;

class TncController extends Controller
{
    public function create(Request $request)
    {
        $vaidatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            ]);
        $data = $request->all();
        $tnc = Tnc::create([
            'title' => $data['title'],
            'user_id' => Auth::id(),
        ]);

        $etherpad = new \EtherpadLite\Client(config('etherpad.api_key'), config('etherpad.url'));
        $authorID = $etherpad->createAuthorIfNotExistsFor(Auth::id(), Auth()->user()->name)->getData('authorID');
        $groupID = $etherpad->createGroupIfNotExistsFor($tnc->id)->getData('groupID');
        $etherpad->createGroupPad($groupID, 'node');
        $padID = $groupID . '$node';
        $readOnlyID = $etherpad->getReadOnlyID($padID)->getData('readOnlyID');
        $sessionTime = time() + 24 * 60 * 60;
        $sessionID = $etherpad->createSession($groupID, $authorID, $sessionTime)->getData('sessionID');
        $host = parse_url(config('etherpad.url'), PHP_URL_HOST);
        setcookie('sessionID', $sessionID, $sessionTime, '/', $host);

        $tnc->pad_id = $padID;
        $tnc->pad_read_id = $readOnlyID;
        $tnc->save();

        Access::create([
            'tnc_id' => $tnc->id,
            'user_id' => Auth::id(),
            'access' => 3,
        ]);

        return redirect('tnc/'.$tnc->id);
    }

    public function show(Request $request, $id)
    {
       
        $tnc = Tnc::find($id);

        $access = Access::select('access')->where('user_id', Auth::id())->where('tnc_id', $id)->first()->access;
        if (!isset($access) &&Auth::user()->is_admin == 1) {
            $access = 1;
        }
        
        $users = User::where('id', '<>', Auth::id());
        $user_ids = $users->pluck('id')->toArray();

        $user_ids_with_access = Access::where('tnc_id', $id)->pluck('user_id')->toArray();
        $user_ids_not_given_access = array_diff($user_ids, $user_ids_with_access);
        $users_not_given_access = User::where('id', '<>', Auth::id())->whereIn('id', $user_ids_not_given_access)->get();
        $users_with_access = $users->whereIn('id', $user_ids_with_access)->get();

        if ($request->get('freeze') != null) {
            if ($request->get('freeze') == "1") {
                $tnc->is_freeze = 1;
                $action = "freeze";
            } else if ($request->get('freeze') == "0") {
                $tnc->is_freeze = 0;
                $action = "unfreeze";
            }
            $tnc->save();

            foreach ($users_with_access as $u) {
                OneSignal::sendNotificationUsingTags(
                    "Owner has ".$action." the document ".$tnc->title,
                    array([
                        "field" => "email",
                        "relation" => "=",
                        "value" => $u->email
                    ])
                );
            }
        }

        $etherpad = new \EtherpadLite\Client(config('etherpad.api_key'), config('etherpad.url'));

        $padID = $tnc->pad_id;
        if ($access == 2 || $access == 3) {
            if (Auth()->user()->is_admin == 1) {
                $user_name = Auth()->user()->name;
            } else {
                $user_name = Auth()->user()->name.' ('.Auth()->user()->user_type.')';
            }
            $authorID = $etherpad->createAuthorIfNotExistsFor(Auth::id(), $user_name)->getData('authorID');
            $groupID = $etherpad->createGroupIfNotExistsFor($id)->getData('groupID');
            $sessionTime = time() + 24 * 60 * 60;
            $sessionID = $etherpad->createSession($groupID, $authorID, $sessionTime)->getData('sessionID');
            $host = parse_url(config('etherpad.url'), PHP_URL_HOST);
            setcookie('sessionID', $sessionID, $sessionTime, '/', $host);
        } else {
            $padID = $tnc->pad_read_id;
        }

        if ($tnc->is_freeze == 1) {
            $padID = $tnc->pad_read_id;
        }
        $owner_id = Access::where('tnc_id', $tnc->id)->where('access', 3)->first()->user_id;
        // dd($owner_id);
        $owner = User::where('id', $owner_id)->first();
        // dd($owner);

        $ts = $etherpad->getLastEdited($tnc->pad_id)->getData('lastEdited');
        $utc = date("Y-m-d H:i", $ts/1000);
        $last_edit = date("d-m-Y H:i", strtotime($utc.' + 330 minute'));

        $version = $etherpad->getRevisionsCount($tnc->pad_id)->getData('revisions');

        return view('tnc_show', [
            'padID' => $padID,
            'title' => $tnc->title,
            'users_not_given_access' => $users_not_given_access,
            'users_with_access' => $users_with_access,
            'tnc_id'   => $id,
            'is_freeze' => $tnc->is_freeze,
            'owner' => $owner->name,
            'owner_id' => $owner_id,
            'last_edit' => $last_edit,
            'version' => $version
        ]);
    }

    public function listArchivedTncs()
    {
        if (Auth::user()->is_admin != 1) {
            $tnc = Tnc::whereIn('id', Access::select('tnc_id')->where('user_id', Auth::id())->where('archive', 1)->get()->toArray())->get();
        } else {
            $tnc = Tnc::where('archive', 1)->get();
        }
        return Datatables::of($tnc)
            ->editColumn('title', function (Tnc $t) {
                return '<a href="'.url('tnc/'.$t->id).'"><u>'.$t->title.'</u><a>';
            })
            ->editColumn('created_at', function (Tnc $t) {
                return $t->created_at->diffForHumans();
            })
            ->addColumn('action', function (Tnc $t) {
                if ($t->user_id == Auth::id()) {
                    return '<a href="'.route('tncs.edit', $t->id).'" class="btn btn-primary btn-sm" style="margin-left:5px">
                    <i class="fas fa-pencil-alt mr-1"></i> Edit Title</a>
                    <a href="'.route('tncs.archive', [$t->id, 0]).'" class="btn btn-warning btn-sm" style="margin-top:5px;margin-left:5px">
                                        <i class="fas fa-pencil-alt mr-1"></i> Un-Archive</a>
                    <form action="'.route('tncs.destroy', $t->id).'" method="POST" class="">
                        '.csrf_field().'
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt mr-1"></i> Delete</button>
                    </form>';
                }
            })
            ->addColumn('owner', function (Tnc $t) {
                return User::where('id', $t->user_id)->first()->name;
            })
            ->addColumn('last_edit', function (Tnc $t) {
                $etherpad = new \EtherpadLite\Client(config('etherpad.api_key'), config('etherpad.url'));
                $ts = $etherpad->getLastEdited($t->pad_id)->getData('lastEdited');
                $utc = date("Y-m-d H:i", $ts/1000);
                return date("d-m-Y H:i", strtotime($utc.' + 330 minute'));
            })
            ->rawColumns([
                'title',
                'action'
            ])
            ->make(true);
    }

    public function listTncs()
    {
        if (Auth::user()->is_admin != 1) {
            $tnc = Tnc::whereIn('id', Access::select('tnc_id')->where('user_id', Auth::id())->where('archive', 0)->get()->toArray())->get();
        } else {
            $tnc = Tnc::where('archive', 0)->get();
        }
        return Datatables::of($tnc)
            ->editColumn('title', function (Tnc $t) {
                return '<a href="'.url('tnc/'.$t->id).'"><u>'.$t->title.'</u><a>';
            })
            ->editColumn('created_at', function (Tnc $t) {
                return $t->created_at->diffForHumans();
            })
            ->addColumn('action', function (Tnc $t) {
                if ($t->user_id == Auth::id()) {
                    return '<a href="'.route('tncs.edit', $t->id).'" class="btn btn-primary btn-sm" style="margin-left:5px">
                    <i class="fas fa-pencil-alt mr-1"></i> Edit Title</a>
                    <a href="'.route('tncs.archive', [$t->id, 1]).'" class="btn btn-warning btn-sm" style="margin-top:5px;margin-left:5px">
                    <i class="fas fa-pencil-alt mr-1"></i> Archive</a>
                    <form action="'.route('tncs.destroy', $t->id).'" method="POST" class="">
                        '.csrf_field().'
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt mr-1"></i> Delete</button>
                    </form>';
                }
            })
            ->addColumn('owner', function (Tnc $t) {
                return User::where('id', $t->user_id)->first()->name;
            })
            ->addColumn('last_edit', function (Tnc $t) {
                $etherpad = new \EtherpadLite\Client(config('etherpad.api_key'), config('etherpad.url'));
                $ts = $etherpad->getLastEdited($t->pad_id)->getData('lastEdited');
                $utc = date("Y-m-d H:i", $ts/1000);
                return date("d-m-Y H:i", strtotime($utc.' + 330 minute'));
            })
            ->rawColumns([
                'title',
                'action'
            ])
            ->make(true);
    }

    public function editTnc($id)
    {
        $tnc = Tnc::find($id);
        if (isset($tnc)) {
            return view('tnc_edit', compact('tnc'));
        }
    }

    public function archiveTnc($id, $val)
    {
        $tnc = Tnc::find($id);
        $tnc->archive = $val;
        $tnc->save();
        if ($val == 0) {
            $msg = 'Tnc successfully unarchived';
        } else {
            $msg = 'Tnc successfully moved to archived';
        }
        return back()->with(['msg' =>$msg, 'class' => 'alert-success']);
    }

    public function updateTnc(Request $request, $id)
    {
        $tnc = Tnc::find($id);
        $data = $request->all();
        $vaidatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            ]);
        if (isset($tnc)) {
            $tnc->title = $data['title'];
            $tnc->save();
        }
        return redirect(url('/tncs'))->with(['msg' =>'Tnc details has been updated successfully', 'class' => 'alert-success']);
    }

    public function destroyTnc($id)
    {
        $tnc  = Tnc::find($id);
        if (isset($tnc)) {
            $tnc->delete();
        }
        return back()->with(['msg' =>'Tnc deleted successfully', 'class' => 'alert-success']);
    }

    public function grantAccess(Request $request, $id)
    {
        if (isset($request->users)) {
            foreach ($request->users as $user_id) {
                $access = new Access;
                $access->tnc_id = $id;
                $access->user_id = $user_id;
                $access->access = $request->access;
                $access->save();

                $title = Tnc::find($id)->title;
                $email = User::find($user_id)->email;
                if ($request->access == 1) {
                    $access = "read";
                } else {
                    $access = "write";
                }
                OneSignal::sendNotificationUsingTags(
                    "You have given ".$access." access to document ".$title,
                    array([
                        "field" => "email",
                        "relation" => "=",
                        "value" => $email
                    ])
                );
            }
        }
        return back()->with(['msg' =>'Tnc access rights has been updated successfully', 'class' => 'alert-success']);
    }

    public function updateAccess(Request $request, $id)
    {
        foreach ($request->access as $user_id => $access_id) {
            $access = Access::where('tnc_id', $id)->where('user_id', $user_id);
            if ($access_id == 0) {
                $access->delete();
            } else {
                $access->update(['access' => $access_id]);
            }
            
            $title = Tnc::find($id)->title;
            $email = User::find($user_id)->email;
            if ($access_id == 1) {
                $access = "read";
            } else {
                $access = "write";
            }
            OneSignal::sendNotificationUsingTags(
                "You have given ".$access." access to document ".$title,
                array([
                    "field" => "email",
                    "relation" => "=",
                    "value" => $email
                ])
            );
        }
        return back()->with(['msg' =>'Tnc access rights has been updated successfully', 'class' => 'alert-success']);
    }
}
