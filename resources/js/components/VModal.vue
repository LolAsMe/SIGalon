<template>
  <basic-modal v-if="showModal" @close="showModal = false">
    <h5 slot="header">Import</h5>
    <div slot="body">
      <form
        id="importForm"
        @submit.prevent="upload"
        @keydown="form.onKeydown($event)"
        enctype="multipart/form-data"
      >
        <div class="mb-3">
          <label for="formFile" class="form-label">File Import</label>
          <input
            @change="handleFileUpload"
            ref="file"
            class="form-control"
            type="file"
            id="file"
          />
        </div>
      </form>
    </div>
    <template v-slot:footer>
      <button @click="showModal = false" class="btn btn-secondary btn-sm">
        Close
      </button>
      <input
        type="submit"
        class="btn btn-primary btn-sm"
        form="importForm"
        value="Import"
      />
    </template>
  </basic-modal>
</template>

<script>
import BasicModal from "~/components/galon/BasicModal";
import Form from "vform";

export default {
  name: "VModal",
  components: {
    BasicModal,
  },
  data() {
    return {
      form: new Form({}),
      showModal: false,
    };
  },
  props:{
  },
  methods: {

  },
};
</script>
