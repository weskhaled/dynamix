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
                      :on-success="handleSuccess"
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
            <el-tab-pane label="SEO" name="fourth">SEO</el-tab-pane>
            <el-tab-pane label="Medias" name="5">

              <el-row :gutter="15" class="media-imgs">
                <el-col :span="6" class="mb-3" v-for="(media, index) in allmedias" :key="index">
                    <el-card shadow="hover">
                      <div class="madia-thumb">
                            <img :src="media.url" class="img-fluid" :alt="media.name">                      
                      </div>
                    </el-card>
                </el-col>
              </el-row>

            </el-tab-pane>
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
           allmedias : [],
      }),
      methods: {
        getslogo(){
          return axios.get(wpApiSettings.root+'dynamix/v1/mods',{},{headers: { 'X-WP-Nonce': wpApiSettings.nonce }})  
        },
        getallmedias(){
          return axios.post(wpApiSettings.root+'dynamix/v1/allmedias',{},{headers: { 'X-WP-Nonce': wpApiSettings.nonce }})  
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
        handleSuccess(response) {
          let self = this;
          console.log(response);
          let imgs = response.image;
          imgs.forEach(function (value, i) {
            console.log('%d: %s', i, value);
            self.fileList.push({'name': i, 'url':value});
          });
        },
        handlePictureCardPreview(file) {
          console.log(file);
          // this.dialogImageUrl = file.url;
          // this.dialogVisible = true;
        },
      },
      mounted: function() {
        this.getslogo().then((response) => {
            console.log(response.data);
            this.fileList.push({'name': 'logo','url':response.data.upload_logo});
        }),
        this.getallmedias().then((response) => {
            console.log(response.data);
            this.allmedias = response.data;
        })  
      },
    }
</script>