# Docler_DailyTasks
This is a simple Magento 2 module for daily tasks for the staff.

## Prerequisites
This module is developed on Magento 2.4.1 version. 
To install this module you need to setup a working Magento 2 website. Setting up Magento 2 website can be found at [Magento Docs](https://devdocs.magento.com/guides/v2.4/install-gde/install/cli/install-cli-install.html)

## Installation
1. Download the .zip file or clone the repository from [git repo](https://github.com/chamikax/aligent-code-test.git)
2. Copy the 'Docler' folder to '<Magento_Root>app/code' folder 

After getting the code to local machine, run below commands to install module to Magento
```php
php bin/magento setup:upgrade
php bin/magento setup:di:compile
```
## Run the application
1. Open the web browser and login to you Magento admin
2. Navigate to Docler -> Daily Tasks

Users can view their tasks for the day from the grid. 
![alt text](https://github.com/chamikax/Docler_DailyTasks//blob/main/data/images/grid.png?raw=true)

Once the task is done the use can acknowledge the task.
