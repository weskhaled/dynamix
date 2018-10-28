<template>
  <div id="app">
  <el-container>
           <el-header style="height: auto;" class="fixed">
            <nav class="navbar navbar-expand-lg navbar-dark">
              <a class="navbar-brand" href="#">
                <span class="logo-text text-white"><span class="light text-white">DYNA</span>WEB</span>
              </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <div class="ml-auto">
                  <el-input placeholder="Please input" v-model="inputsearch" size="small" class="input-with-select">
                    <el-select v-model="selectsearch" slot="prepend" placeholder="Select">
                      <el-option label="Slider" value="slider"></el-option>
                      <el-option label="Quote" value="quote"></el-option>
                      <el-option label="Partner" value="partner"></el-option>
                      <el-option label="Media" value="media"></el-option>
                    </el-select>
                    <el-button slot="append" icon="pg-search"></el-button>
                  </el-input>
              </div>
              <div class="ml-2">
                <el-menu :default-active="page" :router="true" text-color="#fff" 
                         background-color="#8b46ff" active-text-color="#eee"
                         class="el-menu-demo" mode="horizontal">
                  <el-submenu index="" v-if="user != null">
                    <template slot="title">
                      {{ user.name }}
                      <img style="border-radius: 50%;margin: 0 5px;" :src="user.avatar_urls[24]" height="26" width="26">
                    </template>
                    <el-menu-item index="/profile">
                      Profile
                    </el-menu-item>
                    <el-menu-item index="" @click="logout()">Logout</el-menu-item>
                  </el-submenu>
                </el-menu>
              </div>  
            </div>
            </nav>
        </el-header>
    <el-container>
    <el-aside width="auto">
            <el-menu size="small" default-active="2" class="el-menu-vertical-demo menu-collapse" @open="handleOpen" @close="handleClose" :collapse="isCollapse">
              <el-menu-item index="4" @click="toggleSidebar()">
                <i :class="isCollapse ? 'pg-menu' : 'pg-close'"></i>
                <span slot="title">{{isCollapse ? 'Open Navigation' : 'Close Navigation' }}</span>
              </el-menu-item>
            </el-menu>
            <el-menu size="small" :default-active="page" :router="true" class="el-menu-vertical-demo scrolled" @open="handleOpen" @close="handleClose" :collapse="isCollapse">
              <el-menu-item index="/">
                <i class="pg-home"></i>
                <span class="" slot="title">Dashboard</span>
              </el-menu-item>
              <el-submenu size="small" index="1">
                <template slot="title">
                  <i class="el-icon-news"></i>
                  <span slot="title">Generale</span>
                </template>
                <el-menu-item index="/section">Section</el-menu-item>
                <el-submenu index="1-2" size="small">
                  <template slot="title">
                    <span slot="title">Config</span>
                  </template>
                  <el-menu-item index="/slider">Sliders</el-menu-item>
                  <el-menu-item index="1-4-2">Quote</el-menu-item>
                  <el-menu-item index="1-4-3">Partner Cv</el-menu-item>
                </el-submenu>
                <el-submenu index="1-3">
                  <span slot="title">Pages</span>
                  <el-menu-item index="/">Index</el-menu-item>
                  <el-menu-item index="1-3-1">Contact</el-menu-item>
                  <el-menu-item index="1-3-2">Submit Cv</el-menu-item>
                </el-submenu>
              </el-submenu>
              <el-menu-item index="/medias">
                <i class="el-icon-picture-outline"></i>
                <span slot="title">Medias</span>
              </el-menu-item>
              <el-menu-item index="/condidate">
                <i class="fa fa-users"></i>
                <span slot="title">Condidates</span>
              </el-menu-item>
              <el-menu-item index="3" disabled>
                <i class="el-icon-document"></i>
                <span slot="title">Navigator Three</span>
              </el-menu-item>
            </el-menu>
    </el-aside>
    <el-main :style="[isCollapse ? {'margin-left': '64px','transition': '.25s margin-left cubic-bezier(0.4, 0, 1, 1)'} : {'margin-left': '200px','transition': '.2s margin-left cubic-bezier(0.4, 0, 1, 1)'}]">
      <div class="pl-0 pr-0 pt-2 pb-2">
        <router-view></router-view>
      </div>
    </el-main>
    </el-container>
  </el-container>
  </div>
</template>
<script>
import axios from 'axios';
    export default {
      name: "app",
      data: () => ({
         isCollapse: true,
         inputsearch: '',
         selectsearch:'',
         page: '',
         user:null,
      }),
      methods: {
        toggleSidebar(){
          let self = this;
          this.isCollapse = !this.isCollapse;
          setTimeout(function () { 
            self.$root.$emit("message", self.isCollapse)
          } , 300);
        },
        handleSelect(key, keyPath) {
          console.log(key, keyPath);
        },
        handleOpen(key, keyPath) {
          console.log(key, keyPath);
        },
        handleClose(key, keyPath) {
          console.log(key, keyPath);
        },        
        getuser(){
            return axios.get(wpApiSettings.root+'wp/v2/users/me?_wpnonce='+wpApiSettings.nonce,{headers: { 'X-WP-Nonce': wpApiSettings.nonce }})  
        },
        logout(){
          axios.post(wpApiSettings.root+'dynamix/v1/logout',{},{headers: { 'X-WP-Nonce': wpApiSettings.nonce }}).then((response) => {
            if(response.data){
              window.location.href = "/";
            }
            console.log(response.data);
          })  
        },
      },
      mounted(){
        this.page = this.$route.path;
        this.getuser().then((response) => {
            // this.tableCondidate = response.data;
            console.log(response.data);
            this.user = response.data;
        })
      },
      // updated: function () {
      //   this.$nextTick(function () {
      //     this.$root.$emit("message", this.isCollapse);
      //   })
      // },
    }
</script>