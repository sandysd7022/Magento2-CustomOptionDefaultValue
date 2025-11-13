# SD Magento 2 Custom Option Default Value Set
Magento 2 Custom Option Default Value extension use to set custom option default value for products.

# Installation
#### Step-by-step to install the Magento 2 extension through Composer:
1. Locate your Magento 2 project root.

2. Install the Magento 2 extension using [Composer](https://getcomposer.org/)  
 ```bash 
 composer require sandysd7022/magento2-custom-option-default-value-set 
 ```

3. After installation is completed the extension:
 ```bash
# Enable the extension and clear static view files
 $ bin/magento module:enable SD_CustomOptionDefaultValue --clear-static-content
 
 # Update the database schema and data
 $ bin/magento setup:upgrade
 
 # Recompile your Magento project
 $ bin/magento setup:di:compile
 
 # Clean the cache 
 $ bin/magento cache:flush
```
#### Manually (not recommended)
* Download the extension of the required version
* Unzip the file
* Create a folder ````{root}/app/code/SD/CustomOptionDefaultValue````
* Copy the files this folder

#### Overview
*The supported custom options are:*
* Dropdown
* Multiselect
* Radio Box
* Checkbox

![Configuration](https://github.com/sandysd7022/Magento2-CustomOptionDefaultValue/blob/main/configuration-1.png)

![Setting Custom Option of Product](https://github.com/sandysd7022/Magento2-CustomOptionDefaultValue/blob/main/product_1.png)

![Extra info Field](https://github.com/sandysd7022/Magento2-CustomOptionDefaultValue/blob/main/extra_info.png)

#### Support
 If you encounter any problems or bugs, please open an [issue](https://github.com/sandysd7022/Magento2-CustomOptionDefaultValue/issues) on GitHub.
