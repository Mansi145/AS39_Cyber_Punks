# Video & Editor

# About
This repo includes the code for editor and video chat.

# Installation

## Requirements
- `nodejs` >= **10.13.0**.

## Linux

### Installation
```
curl -sL https://deb.nodesource.com/setup_10.x | sudo -E bash -
sudo apt install -y nodejs
git clone --branch master https://github.com/Mansi145/AS39_Cyber_Punks 
Setup Mysql
cd ssrc 
npm install
```

### Manual install
You'll need git and [node.js](https://nodejs.org) installed (minimum required Node version: **10.13.0**).


To update to the latest released version, execute `git pull origin`. The next start with `node_editor/bin/run.sh` will update the dependencies.


## Windows

### Manually install on Windows
You'll need [node.js](https://nodejs.org) and (optionally, though recommended) git.

1. git clone --branch master https://github.com/Mansi145/AS39_Cyber_Punks
2. With a "Run as administrator" command prompt execute `node_editor\bin\installOnWindows.bat`

Now, run `start.bat` and open <http://localhost:9001> in your browser.

Update to the latest version with `git pull origin`, then run `node_editor\bin\installOnWindows.bat`, again.

## Settings
1. You can modify the settings in `settings.json`.
Similarly, `--credentials` can be used to give a settings override file, `--apikey` to give a different APIKEY.txt file and `--sessionkey` to give a non-default SESSIONKEY.txt.
2. SSL Certificate can be added to the node_editor and also set path in settings.
3. TURN\STUN servers ip can be added to the settings.json 
4. Add all db and other information in settings.json

you should use a dedicated database such as `mysql`, 

### VIDEO CHAT

Add in settings.json the below setting to change stun/turn servers.

Example:
"ep_webrtc" : {
  "iceServers":[
    {
      "urls": [ "stun:216.246.6.224:3478", "stun:74.125.140.127:19302", "stun:[2a00:1450:400c:c08::7f]:19302" ]
    }
      ,
    {
      "urls": [ "turn:numb.viagenie.ca" ],
      "credential": "muazkh",
      "username": "webrtc@live.com"
    },
    {
      "urls": ["turn:192.158.29.39:3478?transport=udp"],
      "credential": "JZEOEt2V3Qb0y27GRntt2u2PAYA=",
      "username": "28224511:1379330808"
    }

    ],
}