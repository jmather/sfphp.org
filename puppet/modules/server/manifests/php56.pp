class server::php56 {
  require server::yum
  require server::php56::uninstall

  class { 'server::phpius':
    ius_php_version => 'php56u',
    with_xdebug => false
  }

  class server::php56::uninstall {
    package{ ['php', 'php54', 'php53u', 'php55u']: ensure => absent }
  }
}