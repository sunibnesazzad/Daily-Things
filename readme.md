### Base56 need at least PHP7.1.3
#### Here's how you may update

##### Run the following commands in your ubuntu or mint 
    
    sudo apt-get install -y software-properties-common
    sudo add-apt-repository ppa:ondrej/php -y 
    sudo apt-get -y update
    sudo apt-get install -y php7.2
    sudo apt-cache search php7.2
    sudo apt-get install -y php-redis php7.2-cli php7.2-fpm php7.2-mysql php7.2-curl php7.2-json php7.2-cgi libphp7.2-embed libapache2-mod-php7.2 php7.2-zip php7.2-mbstring php7.2-xml php7.2-intl

    
    sudo systemctl start php7.2-fpm
    sudo systemctl enable php7.2-fpm
    
    
##### Thanks