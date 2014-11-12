class server::php55 {
  require server::yum
  require server::php55::uninstall

  class { 'server::phpius':
    ius_php_version => 'php55u'
  }

  class server::php55::uninstall {
    package{ ['php', 'php54', 'php53u', 'php56u']: ensure => absent }
  }
}