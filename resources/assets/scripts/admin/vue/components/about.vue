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
            <el-tab-pane label="Medias" name="medias">
              <el-row :gutter="15" class="mb-3">
                <el-col :span="24">
                  <el-pagination
                    @size-change="handleSizeChange"
                    @current-change="handleCurrentChange"
                    :current-page.sync="currentPageMedias"
                    :page-sizes="[100, 200, 300, 400]"
                    :page-size="100"
                    layout="total, sizes, prev, pager, next, jumper"
                    :total="50000">
                  </el-pagination>
                </el-col>
              </el-row>
              <el-row :gutter="15" class="media-imgs grid" ref="grid" v-masonry transition-duration="0.3s" item-selector=".grid-item">
                <el-col :span="6" v-masonry-tile class="mb-3 grid-item" v-for="(media, index) in allmedias" :key="index">
                    <figure class="effect-zoe">
                      <img :src="media.url" class="img-fluid" :alt="media.name">
                      <figcaption>
                        <div class="row">
                          <div class="col-sm-8">
                            <h2>{{media.name}}</h2>
                          </div>
                          <div class="col-sm-4">
                            <div class="icon-links pull-right">
                              <a href="#"><i class="icon-eye"></i></a>
                              <a href="#"><i class="icon-pencil"></i></a>
                              <a href="#"><i class="icon-trash"></i></a>
                            </div>
                          </div>
                        </div>
                      </figcaption>			
                    </figure>
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
// import $ from 'jquery';
    export default {
      name: "About",
        data: () => ({
          // reactive data property of the component.
           activeName: 'first',
           fileList: [],
           wpApiSettings: wpApiSettings,
           allmedias : [],
           currentPageMedias : 1,
           msnry : {},
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
          if(tab.name == 'medias'){
            this.$nextTick(function () {
              this.$redrawVueMasonry();
            })
          }
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
        handleSizeChange(val) {
        console.log(`${val} items per page`);
        },
        handleCurrentChange(val) {
          console.log(`current page: ${val}`);
        },
      },
      mounted: function() {
        // let self = this;
        this.getslogo().then((response) => {
            console.log(response.data);
            this.fileList.push({'name': 'logo','url':response.data.upload_logo});
        }),
        this.getallmedias().then((response) => {
            console.log(response.data);
            this.allmedias = response.data;
            this.$redrawVueMasonry();
        })
      },
    }
</script>