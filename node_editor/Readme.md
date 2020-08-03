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
git clone --branch master https://github.com/Mansi145/AS39_Cyber_Punks && cd node_editor/ && bin/run.sh
```

### Manual install
You'll need git and [node.js](https://nodejs.org) installed (minimum required Node version: **10.13.0**).


To update to the latest released version, execute `git pull origin`. The next start with `node_editor/bin/run.sh` will update the dependencies.

[Next steps](#next-steps).

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


you should use a dedicated database such as `mysql`, 

