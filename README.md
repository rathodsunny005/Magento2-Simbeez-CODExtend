# Magento 2 Simbeez_CODExtend

## Overview
Simbeez_CODExtend is a Magento 2 extension that provides admin order create time COD shipping method visible or not. that configuration is backend side

## Features
- Configuration: Admin able to control COD shipping method visible to admin order creation or not

---

## Folder Structure in GitHub

Your GitHub repository should follow this structure:

```
Magento2-Simbeez-CODExtend/   <-- This is your GitHub repo
│── Simbeez/
│   ├── CODExtend/
│   │   ├── etc/
│   │   │   ├── module.xml
│   │   ├── Model/
│   │   ├── Controller/
│   │   ├── Helper/
│   │   ├── view/
│   │   ├── registration.php
│   │   ├── composer.json
│   │   ├── README.md
```

After cloning the repository, move the contents inside `app/code/` in your Magento 2 installation:

```bash
cd /path/to/magento2/app/code/
git clone https://github.com/yourusername/Magento2-Simbeez-CODExtend.git Simbeez/CODExtend
```

This will result in the following Magento 2 directory structure:

```
app/
├── code/
│   ├── Simbeez/
│   │   ├── CODExtend/
│   │   │   ├── etc/
│   │   │   ├── Model/
│   │   │   ├── Controller/
│   │   │   ├── Helper/
│   │   │   ├── view/
│   │   │   ├── registration.php
│   │   │   ├── composer.json
│   │   │   ├── README.md
```

---

## Installation

### 1. Manual Installation (Recommended for Development)

1. Navigate to your Magento root directory:

   ```bash
   cd /path/to/magento2/
   ```

2. Copy the module files to `app/code/Simbeez/CODExtend/`.

3. Run the following Magento CLI commands:

   ```bash
   php bin/magento module:enable Simbeez_CODExtend
   php bin/magento setup:upgrade
   php bin/magento cache:flush
   php bin/magento setup:di:compile
   php bin/magento setup:static-content:deploy -f
   ```
---

## Configuration
After installation, configure the extension in Magento Admin:

1. Navigate to **Stores > Configuration > Payment > Cash On Delivery**.
2. Set the required options as per your needs.
3. Save the configuration and clear the cache:
   ```bash
   php bin/magento cache:flush
   ```

---

## Usage
- [Explain how the user can utilize the module]
- Example commands (if applicable):

  ```bash
  php bin/magento simbeez:codeextend
  ```

---

## Uninstallation

If you want to remove the module, run:

```bash
php bin/magento module:disable Simbeez_CODExtend
php bin/magento setup:upgrade
php bin/magento cache:flush
rm -rf app/code/Simbeez/CODExtend/
composer remove simbeez/code-extend
```

---

## Changelog
### Version 1.0.0
- Initial release

---

## Support
For any issues, please open a GitHub issue or contact [rathodsunny005@gmail.com].

---

## License
This module is licensed under a **proprietary license**. Redistribution, modification, or resale of this extension without permission from Simbeez is strictly prohibited. Unauthorized use, copying, or sharing of this extension will result in legal action.

