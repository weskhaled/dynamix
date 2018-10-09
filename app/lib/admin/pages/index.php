<div id="appadmin">
    <el-container>
        <el-header>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown button
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
            <el-dropdown>
                <i class="el-icon-setting" style="margin-right: 15px"></i>
                <el-dropdown-menu slot="dropdown">
                <el-dropdown-item>View</el-dropdown-item>
                <el-dropdown-item>Add</el-dropdown-item>
                <el-dropdown-item>Delete</el-dropdown-item>
                </el-dropdown-menu>
            </el-dropdown>
            <span>Tom</span>
        </el-header>
        <el-main>
        <h1 class="test">Admin Pages</h1>
            <Card></Card>
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
        </el-main>
    </el-container>
    <!-- dialog -->
    <el-dialog :visible.sync="visible" title="Hello world">
        <p>Try Element</p>
    </el-dialog>
</div>