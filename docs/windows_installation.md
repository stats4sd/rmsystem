# Windows Installation (with Homestead)

The easiest way to get up and running on windows is via `Homestead` virtual box application.

1. Install Homestead

    Installation guidance can be found at:
    https://laravel.com/docs/7.x/homestead

_Note, It is recommended to follow the instructions for VirtualBox_

2. Add SSH certificates
   Install ssh-keygen and generate a key within a designated ssh folder
   https://www.ssh.com/ssh/keygen

```
ssh-keygen -t rsa -b 4096 -C "your_email@example.com"
```

Add the key mapping to `Homestead.yaml`

```
keys:
    - Path/to/key/id_rsa
```

3. Clone this repo to a local folder

```
git clone https://github.com/stats4sd/rmsystem.git
```

4. Add repo mapping to `Homestead.yaml`

```
folders:
    - map: `path/to/cloned/repo`
      to: /home/vagrant/rmsystem
```

(replace `path/to/cloned/repo` with your local system)

5. Run virtual machine
   Once installed the vm can be run directly from VirtualBox.

    _Note. The default virtualbox user will be:_  
     username: **vagrant**  
     password: **vagrant**

6. Install dependencies

```
cd /home/vagrant/rmsystem
```

```
composer install
```

```
npm install --no-bin-links
```

Note, windows users will have issues with symlinks unless running above --no-bin-links flag, see https://github.com/laravel/homestead/issues/611

7. Run the server

```
php artisan serve
```

Assuming all installed correctly, the server should be accessible from any web browser at http://localhost:8000

## Troubleshooting

Making changes to Homestead:

-   Make sure you are running commands from the Homestead cloned repo directory
-   run `vagrant reload` to refresh any changes
