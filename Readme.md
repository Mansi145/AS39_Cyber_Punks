## Collabora.AI

### Team Name:
Cyber_Punks

![Theme](https://github.com/Mansi145/AS39_Cyber_Punks/blob/master/front1.png)

### Problem Statement: 

![Theme](https://github.com/Mansi145/AS39_Cyber_Punks/blob/master/front4.png)

GeM portal is a dedicated E-market for different goods & services procured by Government Organisations / Departments / PSUs. It facilitates online procurement of common use Goods & Services required by various Government Departments / Organisations / PSUs. 

In GeM Portal, we are looking for provision of customization of terms and conditions for Annual Maintenance Contract of services as per the need of the services required by the organisation may be created. It could be module which would 
1-  Provides facility to review terms and conditions of services between concerned persons 
2- Facility to add comment against/add/remove a particular point.

### Ministry Category: 
Ministry of Women and Child Development

### Problem Code:
AS39

### Solution
![Theme](https://github.com/Mansi145/AS39_Cyber_Punks/blob/master/front2.png)
![Theme](https://github.com/Mansi145/AS39_Cyber_Punks/blob/master/front3.png)

[Idea Presentation](https://github.com/Mansi145/AS39_Cyber_Punks/blob/master/Idea_presentation.pptx)

## Cost

Note: Either use cloud pricing or existent local server pricing 

### Going with cloud
| No. | Type | Requirements | Cost | Monthly | One Time | Quantity | 
| :---: | :---: | :---: | :---: | :---: | :---: | :---: | 
| 1 | Cloud | M4.large/C4.xlarge| Rs. 1000/2000 | Yes | No | 1 | 
| 2 | Cloud | Backup Server | Rs. 200 | Yes | No | 1 |   
| 3 | Cloud | Extra Bandwidth | Rs. 1400 | Yes | No | 1 |
| 4 | Cloud | Twilio TURN SERVER | Rs. 6000 | Yes | No | 1 |
| 5 | Cloud | STUN | FREE | Yes | No | 1 |
| 6 | Cloud | T3.micro | Rs. 200 | Yes | No | 3 |
| 7 | Cloud | Elastic Load Balancer | Rs. 1000 | Yes | No | 1 |

4, 5, 6 & 7 will be used if the server cant handle the traffic

- Pods: 2-3 pods/ 6-7 pods if (4,5,6,7)
- Total: Rs. 3600 Min. - 10200 (6&7) Per Month 
 

### Already Existent Servers
| No. | Type | Requirements | Cost | Monthly | One Time | Quantity | 
| :---: | :---: | :---: | :---: | :---: | :---: | :---: | 
| 1 | Local | Host server | NA | NA | Yes | 1 |  
| 2 | Local | Backup server | NA | NA | Yes | 1 |    
| 3 | Cloud | Internet Service Provider | NA | Yes | No | 1 |


## Folder Structure
### gem portal
It contains the frontend and backend of the Collabora.AI. 
- php
- laravel
- mysql

### node_editor
It contains the code for the editor that is used for real time editing.
- nodejs
- mysql

## Installation Instructions 
### Gem Portal - 
[Readme.md](https://github.com/Mansi145/AS39_Cyber_Punks/blob/master/gem%20portal/README.md)
### Node Editor - 
[Readme.md](https://github.com/Mansi145/AS39_Cyber_Punks/blob/master/node_editor/ReadMe.md)

