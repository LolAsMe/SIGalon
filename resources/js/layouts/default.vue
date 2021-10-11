<template>
  <div class="main-layout">
    <navbar />
    <div class="container-fluid">
      <div class="row flex-nowrap">
        <sidebar />
        <div class="col">
          <child />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from "~/components/Navbar";
import Sidebar from "~/components/Sidebar";

export default {
  name: "MainLayout",

  components: {
    Navbar,
    Sidebar,
  },
};
</script>
