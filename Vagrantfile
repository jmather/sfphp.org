# -*- mode: ruby -*-
# vi: set ft=ruby :

# Conventions
# host  == Host Computer
# guest == VM

# submodule check
unless File.exists?("#{File.dirname(__FILE__)}/puppet/modules/mysql/README.md")
  puts 'No Mysql Puppet Module Found: git submodule init && git submodule update'
  exit 1
end

require 'yaml'

config_file_path = File.join(File.dirname(File.expand_path(__FILE__)), 'config.yml')
config_file_dist_path = File.join(File.dirname(File.expand_path(__FILE__)), 'config.dist.yml')

if File.exists?(config_file_path) == false
  print 'No existing configuration file. Copying default config to config.yml'
  print "\r\n"
  config_file = File.open(config_file_dist_path, 'r')
  config_file_contents = config_file.read
  config_file.close
  config_file = File.open(config_file_path, 'w')
  config_file.write(config_file_contents)
  config_file.close
end

vagrant_config = YAML::load_file(config_file_path)

reference_config = YAML::load_file(config_file_dist_path)
reference_config.each do |name, value|
  if vagrant_config.has_key?(name) == false
    print "Error: Your config.yml is out of date. No entry found for '#{name}'\r\n"
    exit 2
  end
end

project_name     = vagrant_config['name']
host_source_root = vagrant_config['base_path']
host_log_root    = vagrant_config['log_path']
web_root         = vagrant_config['web_root']
php_version      = vagrant_config['php_version']
server_mode      = vagrant_config['server_mode']
enable_yum_update= vagrant_config['enable_yum_update']
enable_nfs       = vagrant_config['nfs_enabled']

guest_source_root = '/source'
guest_log_root    = '/mnt/logs'

paths = {
    :host_source_path  => host_source_root,
    :host_log_path    => host_log_root,
}

# We have to clean up the paths because vagrant doesn't want
# relative ones...
paths.each_pair do |name,path|
  paths[name] = File.expand_path(path)
  if File.exists?(paths[name]) == false
    print "The directory #{paths[name]} does not exist.\n"
    exit 1
  end
end

paths[:guest_source_path] = guest_source_root
paths[:guest_log_path]    = guest_log_root

nodes = {
    :all => {
        :hostname => 'www',
        :ipaddress => '192.168.56.60',
    }
}

Vagrant.configure("2") do |config|
  nodes.each_pair do |name,options|
    config.vm.define name do |node|
      # All Vagrant configuration is done here. The most common configuration
      # options are documented and commented below. For a complete reference,
      # please see the online documentation at vagrantup.com.

      # Every Vagrant virtual environment requires a box to build off of.
      # From: http://www.vagrantbox.es/
      node.vm.box = 'CentOS65-i386'

      # The url from where the 'config.vm.box' box will be fetched if it
      # doesn't already exist on the user's system.
      node.vm.box_url = 'https://dl.dropbox.com/s/3fgr7lbvcpn51py/centos_6-5_i386.box'

      # Create a forwarded port mapping which allows access to a specific port
      # within the machine from a port on the host machine. In the example below,
      # accessing "localhost:8080" will access port 80 on the guest machine.
      node.vm.network :forwarded_port, guest: 80, host: 8080

      # Create a private network, which allows host-only access to the machine
      # using a specific IP.
      node.vm.network :private_network, ip: options[:ipaddress]
      node.vm.hostname = "#{options[:hostname]}.example.com"

      # Create a public network, which generally matched to bridged network.
      # Bridged networks make the machine appear as another physical device on
      # your network.
      # config.vm.network :public_network

      # Share an additional folder to the guest VM. The first argument is
      # the path on the host to the actual folder. The second argument is
      # the path on the guest to mount the folder. And the optional third
      # argument is a set of non-required options.

      if enable_nfs
        node.vm.synced_folder paths[:host_source_path], paths[:guest_source_path], :nfs => true
        if host_log_root != 'undef'
          node.vm.synced_folder "#{paths[:host_log_path]}/#{name}", paths[:guest_log_path], :create => true, :nfs => true
        end
      else
        node.vm.synced_folder paths[:host_source_path], paths[:guest_source_path], :mount_options => ['dmode=777','fmode=777']
        if host_log_root != 'undef'
          node.vm.synced_folder "#{paths[:host_log_path]}/#{name}", paths[:guest_log_path], :create => true, :mount_options => ['dmode=777','fmode=777']
        end
      end


      # Provider-specific configuration so you can fine-tune various
      # backing providers for Vagrant. These expose provider-specific options.
      # This one is for VirtualBox:

      node.vm.provider "virtualbox" do |v|
        v.customize ["modifyvm", :id, "--accelerate3d", "off"]

        if nodes.length > 1
          v.name = options[:hostname]
          v.customize ["modifyvm", :id, "--groups", "/#{project_name}"]
        else
          v.name = project_name
        end
      end

      #
      # View the documentation for the provider you're using for more
      # information on available options.

      node.vm.provision :shell, :inline => 'which puppet || yum install puppet'

      node.vm.provision :puppet do |puppet|
        puppet.facter = {
            'host_source_root'  => paths[:host_source_path],
            'guest_source_root' => paths[:guest_source_path],
            'host_log_root'     => paths[:host_log_path],
            'guest_log_root'    => paths[:guest_log_path],
            'web_root'          => web_root,
            'php_version'       => php_version,
            'ip_addresses'      => nodes.map { |name,data| data[:ipaddress] }.join(','),
            'enable_nfs'        => enable_nfs,
        }
        puppet.manifests_path = "puppet/manifests/"
        puppet.manifest_file  = "init.pp"
        puppet.module_path    = "puppet/modules/"
      end
    end
  end
end
