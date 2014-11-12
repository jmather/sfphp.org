class server::php54 {
  require server::yum
  require server::php54::uninstall

  class { 'server::phpius':
    ius_php_version => 'php54',
    with_apc => true,
  }

  class server::php54::uninstall {
    package{ ['php', 'php53u', 'php56u', 'php55u']: ensure => absent }
  }
}