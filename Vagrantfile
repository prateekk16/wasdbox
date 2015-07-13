# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure(2) do |config|



config.vm.box = "hashicorp/precise32"  

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine. In the example below,
  # accessing "localhost:8080" will access port 80 on the guest machine.

  config.vm.network "forwarded_port", guest: 80, host: 1234

  # Bootstrap with Apache2.
  config.vm.provision :shell, path: "bootstrap.sh"

  config.vm.synced_folder ".", "/vagrant", :mount_options => ["dmode=777","fmode=666"]

  
end
