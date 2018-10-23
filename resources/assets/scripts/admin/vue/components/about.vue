<template>
<div class="container-fluid">
    <el-row :gutter="5">
      <el-col :span="24">
          <el-tabs v-model="activeName" @tab-click="handleClick">
            <el-tab-pane label="Général" name="first">
                <el-row :gutter="5">
                  <el-col :span="24">
                    <el-upload
                      class="upload-demo"
                      :action="wpApiSettings.root+'dynamix/v1/logo'"
                      :on-preview="handlePreview"
                      :on-remove="handleRemove"
                      :file-list="fileList"
                      :multiple="false"
                      :headers="{ 'X-WP-Nonce': wpApiSettings.nonce }"
                      list-type="picture-card">
                      <el-button size="small" type="primary">Click to upload</el-button>
                      <div slot="tip" class="el-upload__tip">jpg/png files with a size less than 500kb</div>
                    </el-upload>
                  </el-col>
                </el-row>  
            </el-tab-pane>
            <el-tab-pane label="Configs" name="second">Configs</el-tab-pane>
            <el-tab-pane label="Medias" name="third">Medias</el-tab-pane>
            <el-tab-pane label="SEO" name="fourth">SEO</el-tab-pane>
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
           wpApiSettings: wpApiSettings,
      }),
      methods: {
        getslogo(){
          return axios.get(wpApiSettings.root+'dynamix/v1/mods',{},{headers: { 'X-WP-Nonce': wpApiSettings.nonce }})  
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
            this.fileList.push({'name': 'logo','url':response.data.upload_logo});
        })  
      },
    }
</script>