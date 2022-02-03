  <template>
  <div>
    <table class="table d-sm-table d-none" v-if="items">
      <thead>
        <tr>
          <th scope="col" v-for="(item, index) in itemsTitle" :key="index">
            {{ item }}
          </th>
          <th v-if="isAction">Action</th>
        </tr>
      </thead>
      <tbody v-if="!isAction">
        <tr v-for="(datas, index) in items" :key="index">
          <td v-for="(data, index) in datas" :key="index">{{ data }}</td>
        </tr>
      </tbody>
      <tbody v-else>
        <tr v-for="(datas, index) in items" :key="index">
          <td v-for="(data, index) in datas" :key="index">{{ data }}</td>
          <slot name="action" :data="datas">
            <td>test</td>
          </slot>
        </tr>
      </tbody>
    </table>
    <table class="table d-sm-none d-table" v-if="items">
      <tbody v-show="!isAction" v-for="(datas, index) in items" :key="index">
        <tr v-for="(data, index) in datas" :key="index">
          <th>{{ index }}</th>
          <td>{{ data }}</td>
        </tr>
      </tbody>
      <tbody v-show="isAction" v-for="(datas, index) in items" :key="index">
        <tr v-for="(data, index) in datas" :key="index">
          <th>{{ index }}</th>
          <td>{{ data }}</td>
        </tr>
        <tr>
          <th>action</th>
          <slot name="action" :data="datas">
            <td>test</td>
          </slot>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  name: "VTable",
  render: function (createElement) {
    return createElement("h1", "coba render");
  },
  data() {
    return {
      action: false,
    };
  },

  props: {
    title: { type: String, default: null },
    itemsTitle: { type: Array, default: null },
    items: { type: Array, default: null },
    isAction: { type: Boolean, default: false },
  },
  methods: {},
  created() {},
};
</script>
