<template>
<div class="container-fluid">
    <el-row :gutter="5">
      <el-col :span="24">
          <el-tabs v-model="activeName" @tab-click="handleClick">
            <el-tab-pane label="Logo" name="first">
                <el-row :gutter="5">
                  <el-col :span="24">
                      <el-upload
                        class="upload-demo"
                        drag
                        action="https://jsonplaceholder.typicode.com/posts/"
                        :on-preview="handlePreview"
                        :on-remove="handleRemove"
                        :file-list="fileList"
                        multiple>
                        <i class="el-icon-upload"></i>
                        <div class="el-upload__text">Drop file here or <em>click to upload</em></div>
                        <div class="el-upload__tip" slot="tip">jpg/png files with a size less than 500kb</div>
                      </el-upload>
                  </el-col>
                </el-row>  
            </el-tab-pane>
            <el-tab-pane label="Config" name="second">Config</el-tab-pane>
            <el-tab-pane label="Role" name="third">Role</el-tab-pane>
            <el-tab-pane label="Task" name="fourth">Task</el-tab-pane>
          </el-tabs>
      </el-col>
    </el-row>
</div>  
</template>
<script>
import axios from 'axios';
    export default {
      name: "About",
        data: () => ({
          // reactive data property of the component.
           activeName: 'first',
           fileList: [],
      }),
      methods: {
        getslogo(){
          return axios.get(wpApiSettings.root+'wp/v2/posts/146',{},{headers: { 'X-WP-Nonce': wpApiSettings.nonce }})  
        },
        handleClick(tab) {
          console.log(tab);
        },
        handleRemove(file, fileList) {
          console.log(file, fileList);
        },
        handlePreview(file) {
          console.log(file);
        },
      },
      mounted: function() {
        this.getslogo().then((response) => {
            console.log(response.data);
        })  
      },
    }
</script>