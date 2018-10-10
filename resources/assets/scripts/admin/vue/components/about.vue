<template>
<div class="container-fluid">
    <el-row :gutter="5">
      <el-col :span="24">
        test main
      </el-col>
    </el-row>
</div>  
</template>
<script>
    export default {
      name: "About",
        data: () => ({
          // reactive data property of the component.
          isCollapse: true,
      }),
      methods: {
        handleOpen(key, keyPath) {
          console.log(key, keyPath);
        },
        handleClose(key, keyPath) {
          console.log(key, keyPath);
        },
      },
      mounted: function() {
        
      },
    }
</script>