function page (path) {
  return () => import(/* webpackChunkName: '' */ `~/pages/${path}`).then(m => m.default || m)
}

export default [
  { path: '/', name: 'welcome', component: page('welcome.vue') },

  { path: '/login', name: 'login', component: page('auth/login.vue') },
  { path: '/register', name: 'register', component: page('auth/register.vue') },
  { path: '/password/reset', name: 'password.request', component: page('auth/password/email.vue') },
  { path: '/password/reset/:token', name: 'password.reset', component: page('auth/password/reset.vue') },
  { path: '/email/verify/:id', name: 'verification.verify', component: page('auth/verification/verify.vue') },
  { path: '/email/resend', name: 'verification.resend', component: page('auth/verification/resend.vue') },

  { path: '/home', name: 'home', component: page('home.vue') },
  { path: '/dashboard', name: 'dashboard', component: page('galon/dashboard.vue') },
  { path: '/produk', name: 'produk', component: page('galon/produk.vue') },
  { path: '/aset', name: 'aset', component: page('galon/aset.vue') },
  { path: '/pedagang', name: 'pedagang', component: page('galon/pedagang.vue') },
  { path: '/penjualan', name: 'penjualan', component: page('galon/penjualan.vue') },
  { path: '/kas', name: 'kas', component: page('galon/kas.vue') },
  { path: '/saldo', name: 'saldo', component: page('galon/saldo.vue') },
  { path: '/user', name: 'user', component: page('galon/user.vue') },
  { path: '/transaksi', name: 'transaksi', component: page('galon/transaksi.vue') },
  { path: '/kas/harian', name: 'kas.harian', component: page('galon/kas-harian.vue') },

  { path: '/test', name: 'test', component: page('test.vue') },
  {
    path: '/settings',
    component: page('settings/index.vue'),
    children: [
      { path: '', redirect: { name: 'settings.profile' } },
      { path: 'profile', name: 'settings.profile', component: page('settings/profile.vue') },
      { path: 'password', name: 'settings.password', component: page('settings/password.vue') }
    ]
  },

  { path: '*', component: page('errors/404.vue') }
]
