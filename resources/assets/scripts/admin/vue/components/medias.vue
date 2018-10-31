<template>
<div class="container-fluid">     
    <el-row :gutter="15" class="mt-3 mb-3">
      <el-col :span="24">
          <el-breadcrumb separator-class="el-icon-arrow-right">
              <el-breadcrumb-item :to="{ path: '/' }">Dashboard</el-breadcrumb-item>
              <el-breadcrumb-item>Medias</el-breadcrumb-item>
          </el-breadcrumb>
      </el-col>
    </el-row>  
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
    <el-row :gutter="0" class="media-imgs grid" ref="grid" v-masonry transition-duration="0.3s" item-selector=".grid-item">
      <el-col :span="8" :sm="24" :md="12" :lg="6" class="grid-item text-center" v-masonry-tile>
        <el-card :class="closedcard ? 'closed' : ''" class="d-block p-0 mr-1 mb-1" data-width="1" data-height="1" shadow="hover" style="">
          <div slot="header" class="clearfix d-flex bd-highlight px-2 py-1">
              <div class="mr-auto bd-highlight">
                  <h4 style="margin: 0px;line-height: 34px;font-size: 14px;">Add new</h4>
              </div>
              <div class="action bd-highlight">
                  <el-button class="py-1" type="text">
                    <more-horizontal-icon class=""></more-horizontal-icon>
                  </el-button>
              </div>
          </div>
          <el-upload
            class="upload-demo"
            drag
            :action="wpApiSettings.root+'dynamix/v1/addmedia'"
            :headers="{ 'X-WP-Nonce': wpApiSettings.nonce }"
            :on-success="handleSuccess"
            :on-preview="handlePreview"
            :on-remove="handleRemove"
            :file-list="fileList"
            multiple>
            <i class="el-icon-upload"></i>
            <div class="el-upload__text">Drop file here or <em>click to upload</em></div>
            <div class="el-upload__tip" slot="tip">jpg/png files with a size less than 500kb</div>
          </el-upload>
        </el-card>
      </el-col>
      <el-col :span="8" :sm="24" :md="12" :lg="6" class="grid-item text-center" v-masonry-tile v-for="(media, index) in allmedias" :key="index">
        <el-card :class="((closedmediacard[index]) && (closedmediacard[index].closedcard)) ? 'closed' : ''" class="d-block p-0 mr-1 mb-1" data-width="1" data-height="1" shadow="hover" style="">
          <div slot="header" class="clearfix d-flex bd-highlight px-2 py-1">
              <div class="mr-auto bd-highlight">
                  <h4 style="margin: 0px;line-height: 34px;font-size: 14px;">{{media.name}}</h4>
              </div>
              <div class="action bd-highlight">
                  <el-button class="py-1" type="text">
                    <more-horizontal-icon class=""></more-horizontal-icon>
                  </el-button>
                  <el-button class="py-1" type="text" @click="media.closedcard = !media.closedcard;closedcard = !closedcard;closedcard = !closedcard;closedmediacard[index] = {'media_id' : media.id,'closedcard': !!media.closedcard};reDraw()">
                    <chevron-up-icon class="" v-if="!media.closedcard"></chevron-up-icon>
                    <chevron-down-icon class="" v-if="media.closedcard"></chevron-down-icon>
                  </el-button>
              </div>
          </div>
          <div class="clearfix">
            <figure class="effect-zoe">
              <img :src="media.url" class="img-fluid img-fancy" :alt="media.name">
              <figcaption>
                <div class="row m-0">
                  <div class="col-sm-7 p-0">
                    <h2>{{media.name}}</h2>
                  </div>
                  <div class="col-sm-5 p-0">
                    <div class="icon-links pull-right text-center">
                      <el-button class="ml-1" size="mini" type="primary" circle>
                        <i class="fa fa-eye"></i>
                      </el-button>
                      <el-button class="ml-1" @click="visible = true;viewimg = media" size="mini" type="info" circle>
                        <i class="fa fa-edit"></i>
                      </el-button>
                      <el-button class="ml-1" @click="ConfirmDelete(media)" size="mini" type="danger" circle>
                        <i class="pg-trash"></i>
                      </el-button>
                    </div>
                  </div>
                </div>
              </figcaption>			
            </figure>
          </div>
        </el-card>
      </el-col>
    </el-row>
    <!-- dialog -->
    <el-dialog :visible.sync="visible" :title="viewimg.name">
        <el-row>
          <div class="text-center">
            <img :src="viewimg.url" class="img-fluid">
          </div>
        </el-row>
    </el-dialog>
</div>  
</template>
<script>
import axios from 'axios';
import { MoreHorizontalIcon,ChevronUpIcon,ChevronDownIcon } from 'vue-feather-icons';
// import $ from 'jquery';
export default {
  name: "Section",
  components: {
    MoreHorizontalIcon,
    ChevronUpIcon,
    ChevronDownIcon,
  },
  data: () => ({
      // reactive data property of the component.
        wpApiSettings: wpApiSettings,
        allmedias : [],
        currentPageMedias : 1,
        visible : false,
        closedcard :false,
        closedmediacard : [],
        viewimg: {},
        confirmdelete :false,
        fileList:[],
  }),      
  methods: {
    getallmedias(){
      return axios.post(wpApiSettings.root+'dynamix/v1/allmedias',{},{headers: { 'X-WP-Nonce': wpApiSettings.nonce }})  
    },
    deletepost(id){
      return axios.delete(wpApiSettings.root+'wp/v2/media/'+id+'?force=true',{headers: { 'X-WP-Nonce': wpApiSettings.nonce }})  
    },
    handleRemove(file, fileList) {
      console.log(file, fileList);
    },
    handlePreview(file) {
      console.log(file);
    },
    handleSuccess(response) {
      let self = this;
      // console.log(response); 
      self.allmedias = response;
      this.allmedias.map(x => {
        x.closedcard = true;
        // console.log(x);
      });
      // self.allmedias[0].closedcard = false;
      this.$redrawVueMasonry();
      // let imgs = response.image;
      // imgs.forEach(function (value, i) {
      //   console.log('%d: %s', i, value);
      //   self.fileList.push({'name': i, 'url':value});
      // });
    },
    handlePictureCardPreview(file) {
      console.log(file);
    },
    handleSizeChange(val) {
      console.log(`${val} items per page`);
    },
    handleCurrentChange(val) {
      console.log(`current page: ${val}`);
    },
    reDraw(){
      this.$nextTick(function () {
        this.$redrawVueMasonry();
      })
    },
    ConfirmDelete(media) {
      console.log(media);
      this.$confirm('This will permanently delete the file. Continue?', 'Warning', {
        confirmButtonText: 'OK',
        cancelButtonText: 'Cancel',
        type: 'warning',
      }).then(() => {
        this.deletepost(media.id).then((response) => {
          console.log(response);
          // this.allmedias = response.data;
          this.getallmedias().then((response) => {
            this.allmedias = response.data;
            this.reDraw();
          })
          this.$message({
          showClose: true,
          type: 'success',
          message: 'Delete completed',
        });
        })
      }).catch(() => {
        this.$message({
          showClose: true,
          type: 'info',
          message: 'Delete canceled',
        });          
      });
    },
    renderlayout(){
      console.log('test');
      this.$redrawVueMasonry();
    },
  },
  computed: {
  },
  mounted: function() {
    this.$root.$on('redrawVueMasonry', () => {
        this.reDraw();
    })
    this.getallmedias().then((response) => {
        this.allmedias = response.data;
        this.allmedias.map(x => {
          x.closedcard = false;
          // console.log(x);
        });
        this.reDraw();
    })
  },
  // updated: function () {
  //   this.$nextTick(function () {
  //     // Code that will run only after the
  //     this.reDraw();
  //   })
  // },
}
</script>