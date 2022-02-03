<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
      <router-link
        :to="{ name: user ? 'home' : 'welcome' }"
        class="navbar-brand app-name"
      >
        {{ appName }}
      </router-link>

      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbar"
      >
        <span class="navbar-toggler-icon" />
      </button>

      <div id="navbar" class="collapse navbar-collapse">
        <ul class="navbar-nav">
          <li class="d-block d-md-none nav-item mt-2">
            <router-link
              :to="{ name: 'home' }"
              href="#"
              class="nav-link align-middle px-0"
            >
              <i class="fs-4 bi-house"></i>
              <span class="ms-1 d-inline d-md-inline">Home</span>
            </router-link>
          </li>
          <li class="d-block d-md-none nav-item mt-2">
            <router-link
              :to="{ name: 'dashboard' }"
              class="nav-link px-0 align-middle"
            >
              <i class="fs-4 bi-speedometer2"></i>
              <span class="ms-1 d-inline d-md-inline">Dashboard</span>
            </router-link>
          </li>
          <li class="d-block d-md-none nav-item mt-2">
            <router-link
              :to="{ name: 'stok' }"
              class="nav-link px-0 align-middle"
            >
              <i class="fs-4 bi-speedometer2"></i>
              <span class="ms-1 d-inline d-md-inline">Stok</span>
            </router-link>
          </li>
          <li class="d-block d-md-none nav-item mt-2">
            <router-link
              :to="{ name: 'aset' }"
              class="nav-link px-0 align-middle"
            >
              <i class="fs-4 bi-bootstrap"></i>
              <span class="ms-1 d-inline d-md-inline">Aset</span></router-link
            >
          </li>
          <li class="d-block d-md-none nav-item mt-2">
            <router-link
              :to="{ name: 'saldo' }"
              class="nav-link px-0 align-middle"
            >
              <i class="fs-4 bi-bootstrap"></i>
              <span class="ms-1 d-inline d-md-inline">Saldo</span></router-link
            >
          </li>
          <!-- <li class="d-block d-md-none nav-item mt-2">
          <router-link
            :to="{ name: 'detail.transaksi' }"
            class="nav-link px-0 align-middle"
          >
            <i class="fs-4 bi-bootstrap"></i>
            <span class="ms-1 d-inline d-md-inline"
              >Detail Transaksi</span
            ></router-link
          >
        </li> -->
          <!-- <li class="d-block d-md-none nav-item mt-2">
          <router-link :to="{ name: 'log' }" class="nav-link px-0 align-middle">
            <i class="fs-4 bi-bootstrap"></i>
            <span class="ms-1 d-inline d-md-inline">Log</span></router-link
          >
        </li>
        <li class="d-block d-md-none nav-item mt-2">
          <router-link
            :to="{ name: 'piutang' }"
            class="nav-link px-0 align-middle"
          >
            <i class="fs-4 bi-bootstrap"></i>
            <span class="ms-1 d-inline d-md-inline">Piutang</span></router-link
          >
        </li> -->
          <li class="d-block d-md-none nav-item mt-2">
            <router-link
              :to="{ name: 'utang' }"
              class="nav-link px-0 align-middle"
            >
              <i class="fs-4 bi-bootstrap"></i>
              <span class="ms-1 d-inline d-md-inline">Utang</span></router-link
            >
          </li>
          <li class="d-block d-md-none nav-item mt-2">
            <router-link
              :to="{ name: 'piutang' }"
              class="nav-link px-0 align-middle"
            >
              <i class="fs-4 bi-bootstrap"></i>
              <span class="ms-1 d-inline d-md-inline"
                >Piutang</span
              ></router-link
            >
          </li>
          <li class="d-block d-md-none nav-item mt-2">
            <router-link
              :to="{ name: 'transaksi' }"
              class="nav-link px-0 align-middle"
            >
              <i class="fs-4 bi-bootstrap"></i>
              <span class="ms-1 d-inline d-md-inline"
                >Transaksi</span
              ></router-link
            >
          </li>
          <li class="d-block d-md-none nav-item mt-2">
            <router-link
              :to="{ name: 'laba' }"
              class="nav-link px-0 align-middle"
            >
              <i class="fs-4 bi-bootstrap"></i>
              <span class="ms-1 d-inline d-md-inline">Laba</span></router-link
            >
          </li>

          <li class="d-block d-md-none nav-item mt-2">
            <router-link
              :to="{ name: 'user' }"
              v-role="'Admin'"
              href="#"
              class="nav-link px-0 align-middle"
            >
              <i class="fs-4 bi-people"></i>
              <span class="ms-1 d-inline d-md-inline">User</span>
            </router-link>
          </li>
        </ul>
        <ul class="navbar-nav">
          <locale-dropdown />
          <!-- <li class="d-none nav-item">
            <a class="nav-link" href="#">Link</a>
          </li> -->
        </ul>

        <ul class="navbar-nav ms-auto">
          <!-- Authenticated -->
          <li v-if="user" class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle text-dark"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <img
                :src="user.photo_url"
                class="rounded-circle profile-photo me-1"
              />
              {{ user.name }}
            </a>
            <div class="dropdown-menu">
              <router-link
                :to="{ name: 'settings.profile' }"
                class="dropdown-item ps-3"
              >
                <fa icon="cog" fixed-width />
                {{ $t("settings") }}
              </router-link>

              <div class="dropdown-divider" />
              <a href="#" class="dropdown-item ps-3" @click.prevent="logout">
                <fa icon="sign-out-alt" fixed-width />
                {{ $t("logout") }}
              </a>
            </div>
          </li>
          <!-- Guest -->
          <template v-else>
            <li class="d-none nav-item">
              <router-link
                :to="{ name: 'login' }"
                class="nav-link"
                active-class="active"
              >
                {{ $t("login") }}
              </router-link>
            </li>
            <li class="d-none nav-item">
              <router-link
                :to="{ name: 'register' }"
                class="nav-link"
                active-class="active"
              >
                {{ $t("register") }}
              </router-link>
            </li>
          </template>
        </ul>
      </div>
    </div>
  </nav>
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

  methods: {
    async logout() {
      // Log out the user.
      await this.$store.dispatch("auth/logout");

      // Redirect to login.
      this.$router.push({ name: "login" });
    },
  },
};
</script>

<style scoped>
.profile-photo {
  width: 2rem;
  height: 2rem;
  margin: -0.375rem 0;
}

.container {
  max-width: 9999px;
}

.app-name {
  font-weight: bold;
}
</style>
