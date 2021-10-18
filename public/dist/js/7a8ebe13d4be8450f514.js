"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[66],{7066:(t,a,s)=>{s.r(a),s.d(a,{default:()=>b});var n,i=s(7757),e=s.n(i),r=s(9669),u=s.n(r);function l(t){return function(t){if(Array.isArray(t))return o(t)}(t)||function(t){if("undefined"!=typeof Symbol&&null!=t[Symbol.iterator]||null!=t["@@iterator"])return Array.from(t)}(t)||function(t,a){if(!t)return;if("string"==typeof t)return o(t,a);var s=Object.prototype.toString.call(t).slice(8,-1);"Object"===s&&t.constructor&&(s=t.constructor.name);if("Map"===s||"Set"===s)return Array.from(t);if("Arguments"===s||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(s))return o(t,a)}(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function o(t,a){(null==a||a>t.length)&&(a=t.length);for(var s=0,n=new Array(a);s<a;s++)n[s]=t[s];return n}function c(t,a,s,n,i,e,r){try{var u=t[e](r),l=u.value}catch(t){return void s(t)}u.done?a(l):Promise.resolve(l).then(n,i)}function m(t,a){var s=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);a&&(n=n.filter((function(a){return Object.getOwnPropertyDescriptor(t,a).enumerable}))),s.push.apply(s,n)}return s}function h(t){for(var a=1;a<arguments.length;a++){var s=null!=arguments[a]?arguments[a]:{};a%2?m(Object(s),!0).forEach((function(a){v(t,a,s[a])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(s)):m(Object(s)).forEach((function(a){Object.defineProperty(t,a,Object.getOwnPropertyDescriptor(s,a))}))}return t}function v(t,a,s){return a in t?Object.defineProperty(t,a,{value:s,enumerable:!0,configurable:!0,writable:!0}):t[a]=s,t}const d={middleware:"auth",data:function(){return{showItemList:!1,showPayer:!1,showItem:[!0,!1,!0],payer_id:1,jumlahMasuk:0,jumlahKeluar:0,jumlahAir:0,jumlahGalon:0,jumlahKardus:0,bayar:0,uang:0}},computed:h(h({},s(629).Se((n={user:"auth/user",supliers:"suplier/supliers"},v(n,"supliers","suplier/supliers"),v(n,"asets","aset/asets"),n))),{},{payer:function(){var t=this;return this.supliers.find((function(a){return a.id==t.payer_id}))},utang:function(){return this.payer.utang&&0!=this.payer.utang.length?"-"+this.payer.utang[0].jumlah+" Galon":this.payer.piutang&&0!=this.payer.piutang.length?"+"+this.payer.piutang[0].jumlah+" Galon":void 0},totalAir:function(){return this.jumlahAir*this.asets[0].harga_beli},totalGalon:function(){return this.jumlahGalon*this.asets[1].harga_beli},totalKardus:function(){return this.jumlahKardus*this.asets[2].harga_beli},jumlah:function(){var t=this.totalAir+this.totalGalon+this.totalKardus;return this.bayar=t,this.uang=t,t},kembali:function(){return this.uang-this.bayar},sisaGalon:function(){return this.payer.utang&&0!=this.payer.utang.length?+this.payer.utang[0].jumlah+this.jumlahMasuk-this.jumlahKeluar:this.payer.piutang&&0!=this.payer.piutang.length?-this.payer.piutang[0].jumlah+this.jumlahMasuk-this.jumlahKeluar:void 0},transaksiItem:function(){var t=[];if(this.jumlahAir>0){var a=[{kredit:this.jumlahAir*this.asets[0].harga_beli,jumlah:this.jumlahAir,harga:this.asets[0].harga_beli,keterangan:"test",tipe:"Saldo"},{jumlah:this.jumlahAir,keterangan:"test",tipe:"Aset",id:this.asets[0].id,kode:"debit"}];t.push.apply(t,a)}if(this.jumlahGalon>0){var s=[{kredit:this.jumlahGalon*this.asets[1].harga_beli,jumlah:this.jumlahGalon,harga:this.asets[1].harga_beli,keterangan:"test",tipe:"Saldo"},{jumlah:this.jumlahGalon,keterangan:"test",tipe:"Aset",id:this.asets[1].id,kode:"debit"}];t.push.apply(t,s)}if(this.jumlahKardus>0){var n=[{kredit:this.jumlahKardus*this.asets[2].harga_beli,jumlah:this.jumlahKardus,harga:this.asets[2].harga_beli,keterangan:"test",tipe:"Saldo"},{jumlah:this.jumlahKardus,keterangan:"test",tipe:"Aset",id:this.asets[2].id,kode:"debit"}];t.push.apply(t,n)}return t},transaksiUtang:function(){var t,a,s,n=[];if(this.jumlahMasuk!=this.jumlahKeluar){this.jumlahMasuk>this.jumlahKeluar&&(t="kredit",a="debit",s=this.jumlahMasuk-this.jumlahKeluar),this.jumlahMasuk<this.jumlahKeluar&&(t="debit",a="kredit",s=this.jumlahKeluar-this.jumlahMasuk);var i=[{jumlah:s,keterangan:"test",tipe:"Aset",id:2,kode:t,jenis:"utang"},{aset_id:2,jumlah:s,kode:a,keterangan:"test",tipe:"Utang"}];n.push.apply(n,i)}return n}}),components:{},methods:{showItemData:function(t){this.$set(this.showItem,t,!this.showItem[t]),0==t&&0==this.showItem[t]?this.jumlahAir=0:1==t&&0==this.showItem[t]?this.jumlahGalon=0:2==t&&0==this.showItem[t]&&(this.jumlahKardus=0)},submitTransaksi:function(){var t,a=this;return(t=e().mark((function t(){var s;return e().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.prev=0,s={payer_type:"suplier",payer_id:"1",transaksis:[].concat(l(a.transaksiItem),l(a.transaksiUtang))},t.next=5,u().post("/api/transaksi",s);case 5:t.sent,a.jumlahMasuk=0,a.jumlahKeluar=0,a.jumlahAir=0,a.jumlahGalon=0,a.jumlahKardus=0,a.bayar=0,a.uang=0,a.$store.dispatch("suplier/fetchSupliers"),a.$store.dispatch("aset/fetchAsets"),t.next=20;break;case 17:t.prev=17,t.t0=t.catch(0),console.log(t.t0);case 20:case"end":return t.stop()}}),t,null,[[0,17]])})),function(){var a=this,s=arguments;return new Promise((function(n,i){var e=t.apply(a,s);function r(t){c(e,n,i,r,u,"next",t)}function u(t){c(e,n,i,r,u,"throw",t)}r(void 0)}))})()}},watch:{jumlahAir:function(t){this.jumlahMasuk=t,this.jumlahKeluar=t}},created:function(){this.$store.dispatch("suplier/fetchSupliers"),this.$store.dispatch("aset/fetchAsets"),this.loading=!1},metaInfo:function(){return{title:"Dashboard"}}};const b=(0,s(1900).Z)(d,(function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("div",{staticClass:"row mb-5 mx-md-4"},[s("div",{staticClass:"col transaksi"},[t._m(0),t._v(" "),s("div",{staticClass:"d-flex flex-row-reverse"},[s("a",{staticClass:"btn btn-primary btn-sm",on:{click:function(a){t.showPayer=!t.showPayer}}},[t._v(t._s(t.payer.nama))])]),t._v(" "),s("div",{directives:[{name:"show",rawName:"v-show",value:t.showPayer,expression:"showPayer"}],staticClass:"mt-1"},t._l(t.supliers,(function(a){return s("ul",{key:a.id,staticClass:"list-group"},[s("li",{staticClass:"list-group-item mt-1",on:{click:function(s){t.payer_id=a.id,t.showPayer=!t.showPayer}}},[t._v("\n          "+t._s(a.nama)+"\n        ")])])})),0),t._v(" "),s("div",{staticClass:"d-flex pt-1"},[s("button",{staticClass:"btn btn-primary btn-sm me-auto",attrs:{type:"button"},on:{click:function(a){t.showItemList=!t.showItemList}}},[t._v("\n        Add Item\n      ")]),t._v(" "),s("button",{directives:[{name:"show",rawName:"v-show",value:t.utang,expression:"utang"}],staticClass:"btn btn-secondary btn-sm"},[t._v("\n        "+t._s(t.utang)+"\n      ")])])]),t._v(" "),s("div",{directives:[{name:"show",rawName:"v-show",value:t.showItemList,expression:"showItemList"}],staticClass:"mt-1",attrs:{id:"addItem"}},[t._l(t.asets,(function(a,n){return s("ul",{key:a.id,staticClass:"list-group"},[s("li",{staticClass:"list-group-item mt-1 border",class:{"border-success":t.showItem[n]},on:{click:function(a){return t.showItemData(n)}}},[t._v("\n        "+t._s(a.nama)+"\n      ")])])})),t._v(" "),s("button",{staticClass:"mt-1",on:{click:function(a){t.showItemList=!t.showItemList}}},[t._v("Close")])],2),t._v(" "),t.loading?t._e():s("div",{staticClass:"col-12"},[s("div",{staticClass:"card"},[s("div",{staticClass:"card-body p-0"},[t.showItem[0]?s("div",{staticClass:"item border border-primary p-2"},[s("div",{staticClass:"d-flex sepertiga"},[s("div",[t._v("Air Galon")]),t._v(" "),s("div",{staticClass:"text-center"},[t._v(t._s(t.asets[0].jumlah))])]),t._v(" "),s("div",{staticClass:"d-flex mt-2"},[s("div",{staticClass:"input-group input-in-out input-group-sm mb-3"},[s("span",{staticClass:"input-group-text",attrs:{id:"inputGroup-sizing-sm"}},[t._v("Masuk")]),t._v(" "),s("input",{directives:[{name:"model",rawName:"v-model",value:t.jumlahMasuk,expression:"jumlahMasuk"}],staticClass:"form-control",attrs:{type:"number","aria-label":"Sizing example input","aria-describedby":"inputGroup-sizing-sm"},domProps:{value:t.jumlahMasuk},on:{input:function(a){a.target.composing||(t.jumlahMasuk=a.target.value)}}})]),t._v(" "),s("div",{staticClass:"input-group input-in-out input-group-sm mb-3"},[s("span",{staticClass:"input-group-text",attrs:{id:"inputGroup-sizing-sm"}},[t._v("Keluar")]),t._v(" "),s("input",{directives:[{name:"model",rawName:"v-model",value:t.jumlahKeluar,expression:"jumlahKeluar"}],staticClass:"form-control",attrs:{type:"number","aria-label":"Sizing example input","aria-describedby":"inputGroup-sizing-sm"},domProps:{value:t.jumlahKeluar},on:{input:function(a){a.target.composing||(t.jumlahKeluar=a.target.value)}}})])]),t._v(" "),s("div",{staticClass:"d-inline-flex justify-content-evenly",staticStyle:{width:"49.2%"}},[s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.jumlahMasuk+=5}}},[t._v("\n              +5\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.jumlahMasuk+=1}}},[t._v("\n              +1\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.jumlahMasuk-=1}}},[t._v("\n              -1\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.jumlahMasuk-=5}}},[t._v("\n              -5\n            ")])]),t._v(" "),s("div",{staticClass:"d-inline-flex justify-content-evenly",staticStyle:{width:"49.2%"}},[s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.jumlahKeluar+=5}}},[t._v("\n              +5\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.jumlahKeluar+=1}}},[t._v("\n              +1\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.jumlahKeluar-=1}}},[t._v("\n              -1\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.jumlahKeluar-=5}}},[t._v("\n              -5\n            ")])]),t._v(" "),s("div",{staticClass:"d-flex sepertiga mt-3"},[s("div",{staticClass:"input-group input-in-out input-group-sm mb-3"},[s("span",{staticClass:"input-group-text",attrs:{id:"inputGroup-sizing-sm"}},[t._v("jumlah")]),t._v(" "),s("input",{directives:[{name:"model",rawName:"v-model",value:t.jumlahAir,expression:"jumlahAir"}],staticClass:"form-control",attrs:{type:"number","aria-label":"Sizing example input","aria-describedby":"inputGroup-sizing-sm"},domProps:{value:t.jumlahAir},on:{input:function(a){a.target.composing||(t.jumlahAir=a.target.value)}}})]),t._v(" "),s("div",{staticClass:"text-center"},[t._v("x Rp "+t._s(t.asets[0].harga_beli))]),t._v(" "),s("div",{staticClass:"text-end"},[t._v("Rp "+t._s(t.totalAir))])]),t._v(" "),s("div",{staticClass:"d-inline-flex justify-content-evenly",staticStyle:{width:"100%"}},[s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.jumlahAir+=10}}},[t._v("\n              +10\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.jumlahAir+=5}}},[t._v("\n              +5\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.jumlahAir+=1}}},[t._v("\n              +1\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.jumlahAir-=1}}},[t._v("\n              -1\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.jumlahAir-=5}}},[t._v("\n              -5\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.jumlahAir-=10}}},[t._v("\n              -10\n            ")])])]):t._e(),t._v(" "),t.showItem[1]?s("div",{staticClass:"item border border-primary p-2"},[s("div",{staticClass:"d-flex sepertiga"},[s("div",[t._v("Galon")]),t._v(" "),s("div",{staticClass:"text-center"},[t._v(t._s(t.asets[1].jumlah))])]),t._v(" "),s("div",{staticClass:"d-flex sepertiga"},[s("div",{staticClass:"input-group input-in-out input-group-sm mb-3"},[s("span",{staticClass:"input-group-text",attrs:{id:"inputGroup-sizing-sm"}},[t._v("jumlah")]),t._v(" "),s("input",{directives:[{name:"model",rawName:"v-model",value:t.jumlahGalon,expression:"jumlahGalon"}],staticClass:"form-control",attrs:{type:"number","aria-label":"Sizing example input","aria-describedby":"inputGroup-sizing-sm"},domProps:{value:t.jumlahGalon},on:{input:function(a){a.target.composing||(t.jumlahGalon=a.target.value)}}})]),t._v(" "),s("div",{staticClass:"text-center"},[t._v("x Rp "+t._s(t.asets[1].harga_beli))]),t._v(" "),s("div",{staticClass:"text-end"},[t._v("Rp "+t._s(t.totalGalon))])]),t._v(" "),s("div",{staticClass:"d-inline-flex justify-content-evenly",staticStyle:{width:"100%"}},[s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.jumlahGalon+=10}}},[t._v("\n              +10\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.jumlahGalon+=5}}},[t._v("\n              +5\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.jumlahGalon+=1}}},[t._v("\n              +1\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.jumlahGalon-=1}}},[t._v("\n              -1\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.jumlahGalon-=5}}},[t._v("\n              -5\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.jumlahGalon-=10}}},[t._v("\n              -10\n            ")])])]):t._e(),t._v(" "),t.showItem[2]?s("div",{staticClass:"item border border-primary p-2"},[s("div",{staticClass:"d-flex sepertiga"},[s("div",[t._v("Kardus")]),t._v(" "),s("div",{staticClass:"text-center"},[t._v(t._s(t.asets[2].jumlah))])]),t._v(" "),s("div",{staticClass:"d-flex sepertiga"},[s("div",{staticClass:"input-group input-in-out input-group-sm mb-3"},[s("span",{staticClass:"input-group-text",attrs:{id:"inputGroup-sizing-sm"}},[t._v("jumlah")]),t._v(" "),s("input",{directives:[{name:"model",rawName:"v-model",value:t.jumlahKardus,expression:"jumlahKardus"}],staticClass:"form-control",attrs:{type:"number","aria-label":"Sizing example input","aria-describedby":"inputGroup-sizing-sm"},domProps:{value:t.jumlahKardus},on:{input:function(a){a.target.composing||(t.jumlahKardus=a.target.value)}}})]),t._v(" "),s("div",{staticClass:"text-center"},[t._v("x Rp "+t._s(t.asets[2].harga_beli))]),t._v(" "),s("div",{staticClass:"text-end"},[t._v("Rp "+t._s(t.totalKardus))])]),t._v(" "),s("div",{staticClass:"d-inline-flex justify-content-evenly",staticStyle:{width:"100%"}},[s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.jumlahKardus+=10}}},[t._v("\n              +10\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.jumlahKardus+=5}}},[t._v("\n              +5\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.jumlahKardus+=1}}},[t._v("\n              +1\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.jumlahKardus-=1}}},[t._v("\n              -1\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.jumlahKardus-=5}}},[t._v("\n              -5\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.jumlahKardus-=10}}},[t._v("\n              -10\n            ")])])]):t._e(),t._v(" "),s("div",{staticClass:"item border border-primary p-2"},[s("div",{staticClass:"d-flex pt-1"},[s("div",{staticClass:"me-auto"},[t._v("Jumlah")]),t._v(" "),s("div",[t._v("Rp "+t._s(t.jumlah))])]),t._v(" "),s("div",{staticClass:"d-flex pt-1"},[s("div",{staticClass:"me-auto"},[t._v("Bayar")]),t._v(" "),s("div",[t._v("Rp "+t._s(t.bayar))])]),t._v(" "),s("div",{staticClass:"d-inline-flex justify-content-evenly",staticStyle:{width:"100%"}},[s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.bayar+=5e4}}},[t._v("\n              +50\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.bayar+=5e3}}},[t._v("\n              +5\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.bayar+=1e3}}},[t._v("\n              +1\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.bayar-=1e3}}},[t._v("\n              -1\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.bayar-=5e3}}},[t._v("\n              -5\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.bayar-=5e4}}},[t._v("\n              -50\n            ")])]),t._v(" "),s("div",{staticClass:"d-flex pt-1"},[s("div",{staticClass:"me-auto"},[t._v("Uang")]),t._v(" "),s("div",[t._v("Rp "+t._s(t.uang))])]),t._v(" "),s("div",{staticClass:"d-inline-flex justify-content-evenly",staticStyle:{width:"100%"}},[s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.uang+=5e4}}},[t._v("\n              +50\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.uang+=5e3}}},[t._v("\n              +5\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.uang+=1e3}}},[t._v("\n              +1\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.uang-=1e3}}},[t._v("\n              -1\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.uang-=5e3}}},[t._v("\n              -5\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-exsm btn-secondary",on:{click:function(a){t.uang-=5e4}}},[t._v("\n              -50\n            ")])]),t._v(" "),s("div",{staticClass:"d-flex pt-1"},[s("div",{staticClass:"me-auto"},[t._v("Kembali")]),t._v(" "),s("div",[t._v("Rp "+t._s(t.kembali))])]),t._v(" "),s("div",[t._v("Keterangan : "+t._s(t.sisaGalon)+" Galon")])]),t._v(" "),s("button",{staticClass:"btn btn-primary btn-sm mt-1",on:{click:t.submitTransaksi}},[t._v("\n          Submit\n        ")])])])])])}),[function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("div",{staticClass:"judul"},[s("h4",[t._v("Transaksi "),s("span",{staticClass:"text-primary"},[t._v("Penyetokan")])])])}],!1,null,"26f09884",null).exports}}]);