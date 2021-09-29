<template>
  <div
    v-if="user"
    class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-white shadow"
  >
    <div
      style="position: sticky"
      class="
        nav
        d-flex
        flex-column
        align-items-center align-items-sm-start
        px-3
        text-white
        min-vh-100
      "
    >
      <ul
        class="
          nav nav-pills
          flex-column
          mb-sm-auto mb-0
          align-items-center align-items-sm-start
        "
        id="menu"
      >
        <li class="nav-item mt-2">
          <router-link
            :to="{ name: 'home' }"
            href="#"
            class="nav-link align-middle px-0"
          >
            <i class="fs-4 bi-house"></i>
            <span class="ms-1 d-none d-sm-inline">Home</span>
          </router-link>
        </li>
        <li>
          <router-link
            :to="{ name: 'dashboard' }"
            class="nav-link px-0 align-middle"
          >
            <i class="fs-4 bi-speedometer2"></i>
            <span class="ms-1 d-none d-sm-inline">Dashboard</span>
          </router-link>
        </li>
        <li>
          <router-link
            :to="{ name: 'aset' }"
            class="nav-link px-0 align-middle"
          >
            <i class="fs-4 bi-bootstrap"></i>
            <span class="ms-1 d-none d-sm-inline">Aset</span></router-link
          >
        </li>
        <li>
          <router-link
            :to="{ name: 'saldo' }"
            class="nav-link px-0 align-middle"
          >
            <i class="fs-4 bi-bootstrap"></i>
            <span class="ms-1 d-none d-sm-inline">Saldo</span></router-link
          >
        </li>
        <li>
          <router-link
            :to="{ name: 'detail.transaksi' }"
            class="nav-link px-0 align-middle"
          >
            <i class="fs-4 bi-bootstrap"></i>
            <span class="ms-1 d-none d-sm-inline">Detail Transaksi</span></router-link
          >
        </li>
        <li>
          <router-link
            :to="{ name: 'log' }"
            class="nav-link px-0 align-middle"
          >
            <i class="fs-4 bi-bootstrap"></i>
            <span class="ms-1 d-none d-sm-inline">Log</span></router-link
          >
        </li>
        <li>
          <router-link
            :to="{ name: 'piutang' }"
            class="nav-link px-0 align-middle"
          >
            <i class="fs-4 bi-bootstrap"></i>
            <span class="ms-1 d-none d-sm-inline">Piutang</span></router-link
          >
        </li>

        <li>
          <router-link
            :to="{ name: 'transaksi' }"
            class="nav-link px-0 align-middle"
          >
            <i class="fs-4 bi-bootstrap"></i>
            <span class="ms-1 d-none d-sm-inline">Transaksi</span></router-link
          >
        </li>
        <li>
          <router-link
            :to="{ name: 'utang' }"
            class="nav-link px-0 align-middle"
          >
            <i class="fs-4 bi-bootstrap"></i>
            <span class="ms-1 d-none d-sm-inline">Utang</span></router-link
          >
        </li>

        <li>
          <router-link
            :to="{ name: 'user' }"
            v-role="'Admin'"
            href="#"
            class="nav-link px-0 align-middle"
          >
            <i class="fs-4 bi-people"></i>
            <span class="ms-1 d-none d-sm-inline">User</span>
          </router-link>
        </li>
      </ul>
      <hr />
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import LocaleDropdown from "./LocaleDropdown";

export default {
  components: {
    LocaleDropdown,
  },

  data: () => ({
    appName: window.config.appName,
  }),

  computed: mapGetters({
    user: "auth/user",
  }),
};
</script>

<style scoped>
</style>
