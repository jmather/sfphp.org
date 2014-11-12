# Puppet manifest for my PHP dev machine
Exec { path => [ "/bin/", "/sbin/" , "/usr/bin/", "/usr/sbin/" ] }
class phpdevweb {
  include stdlib

  if ($enable_nfs) {
    require server::nfs
  }

  require server::yum
  require server::misc
  include server::iptables
  include server::phpdev
  include server::httpd

  #	file { "/tmp/facts.yaml":
  #   content => inline_template("<%= scope.to_hash.reject { |k,v| !( k.is_a?(String) && v.is_a?(String) ) }.to_yaml %>"),
  # }

  include server::php

  class { server::db:
    ip_addresses => $ip_addresses,
  }
}



include phpdevweb