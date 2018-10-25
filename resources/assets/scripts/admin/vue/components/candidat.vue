<template>
<div class="container-fluid">
  <el-row>
      <el-col :span="24">
          <h2 class="test">List Of Condidate</h2>
      </el-col>
  </el-row>
  <el-row>
    <el-col :span="24">
    
        <el-table
            :data="tableCondidate"
            style="width: 100%"
            max-height="550">
            <el-table-column
            fixed
            prop="id"
            label="ID"
            width="70">
            </el-table-column>
            <el-table-column
            fixed
            prop="firstname"
            label="First Name"
            width="150">
            </el-table-column>
            <el-table-column
            prop="lastname"
            label="Last Name"
            width="250">
            </el-table-column>
            <el-table-column
            prop="phone"
            label="Phone Number"
            width="250">
            </el-table-column>
            <el-table-column
            prop="message"
            label="Message"
            width="450">
            </el-table-column>
            <el-table-column
            fixed="right"
            label="Actions"
            width="220">
            <template slot-scope="scope">
                <el-button
                @click.native.prevent="deleteCondidate(scope.row)"
                type="danger" 
                round
                size="mini">
                Remove
                </el-button>
                <el-button
                @click.native.prevent="viewCondidate(scope.row)"
                type="primary" 
                round
                size="mini">
                View
                </el-button>
            </template>
            </el-table-column>
        </el-table>
    </el-col>
    <el-col>

        <el-pagination
            :current-page.sync="currentPage1"
            :page-size="100"
            layout="total, prev, pager, next"
            :total="1000">
        </el-pagination>

    </el-col>
  </el-row>
  <!-- dialog -->
  <el-dialog :visible.sync="visible" title="Hello world">
      <el-row>
      test
      </el-row>
  </el-dialog>
</div>    
</template>
<script>
import axios from 'axios';
    export default {
      name: "Condidat",
      data: () => ({
          visible:false,
          tableCondidate: [      
            {
            id: '1',
            firstname: 'Tom',
            lastname: 'Weskhaled',
            phone: '58685536',
            message: 'Los Angeles',
            }, {
            id: '2',
            firstname: 'Tom 2',
            lastname: 'Weskhaled 2',
            phone: '58685536',
            message: 'Los Angeles 2',
            }, {
            id: '2',
            firstname: 'Tom 2',
            lastname: 'Weskhaled 2',
            phone: '58685536',
            message: 'Los Angeles 2',
            }, {
            id: '2',
            firstname: 'Tom 2',
            lastname: 'Weskhaled 2',
            phone: '58685536',
            message: 'Los Angeles 2',
            },
        ],
          currentPage1: 1,

      }),
      methods: {
        getsliders(){
            return axios.get(wpApiSettings.root+'wp/v2/media',{headers: { 'X-WP-Nonce': wpApiSettings.nonce }})  
        },
        deleteCondidate(datarow){
          this.$confirm('This will permanently delete the file. Continue?', 'Warning', {
            confirmButtonText: 'OK',
            cancelButtonText: 'Cancel',
            type: 'warning',
          }).then(() => {
              console.log(datarow);
              this.$message({
                showClose: true,
                type: 'success',
                message: 'Delete completed',
              });
          }).catch(() => {
            this.$message({
              showClose: true,
              type: 'info',
              message: 'Delete canceled',
            });          
          });
        },
        viewCondidate(datarow){
            this.visible = true;
            console.log(datarow);
        },
      },
      mounted: function() {
        // let self = this;
        this.getsliders().then((response) => {
            // this.tableCondidate = response.data;
            console.log(response.data);
        })
      },
    }
</script>