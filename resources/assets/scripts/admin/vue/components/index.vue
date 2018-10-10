<template>
<div class="container-fluid">
  <el-row>
      <el-col :span="24">
          <h1 class="test">Admin Pages</h1>
          <div class="block">
              <span class="demonstration">Start date time 12:00:00, end date time 08:00:00</span>
              <el-date-picker v-model="value7" size="small"
                              type="datetimerange"
                              align="right"
                              start-placeholder="Start Date"
                              end-placeholder="End Date"
                              :default-time="['12:00:00', '08:00:00']">
              </el-date-picker>
          </div>
          <el-button @click="visible = true" size="small">Button</el-button>
      </el-col>
  </el-row>
  <!-- dialog -->
  <el-dialog :visible.sync="visible" title="Hello world">
      <p>Try Element</p>
  </el-dialog>
</div>    
</template>
<script>
    export default {
      name: "Index",
      data: () => ({
          visible:false,
          value7:'',
          // reactive data property of the component.
          webpack: 'Powered by home!',
      }),
      mounted: function() {
        console.log('test mounted', this.webpack);
      },
    }
</script>