<template>
  <div>
    <router-link to="/posts/create" class="mr-2">
      <el-button type="primary" size="small">Thêm mới</el-button>
    </router-link>
    <el-button type="primary" plain size="small">Xuất Excel</el-button>
    <div class="mt-3"></div>
    <el-table
      v-if="posts"
      :data="posts"
      style="width: 100%">
      <el-table-column
        prop="id"
        label="ID"
        sortable
        width="60"> 
      </el-table-column>
      <el-table-column
        prop="title"
        label="Tiêu đề" 
        sortable
        width="700"
      >
      <template slot-scope="scope">
        <router-link :to="`/posts/${scope.row.id}`">
          {{ scope.row.title }}
        </router-link>
      </template>
      </el-table-column>
      <el-table-column
        prop="category.name"
        label="Danh mục"
        sortable
      > 
      </el-table-column>
      <el-table-column
        prop="view"
        label="Lượt xem"
        sortable
      > 
      </el-table-column>
      <el-table-column
        prop="view"
        label="Ngày đăng"
        sortable
      > 
      <template slot-scope="scope">
        <span>
          {{ scope.row.created_at | dmy }}
        </span> 
      </template>
      </el-table-column>
      <el-table-column align="right" width="300"> 
        <template slot-scope="scope">
          <el-button
            size="mini"
            @click="handleEdit(scope.$index, scope.row)">
            <i class="fa fa-eye"></i>
          </el-button>
          <el-button
            size="mini"
            type="warning"
            @click="handleDelete(scope.$index, scope.row)">
            <i class="fa fa-pencil"></i>
          </el-button>
          <el-button
            size="mini"
            type="danger"
            @click="handleDelete(scope.$index, scope.row)">
            <i class="fa fa-trash"></i>
          </el-button>
        </template>
      </el-table-column>
    </el-table> 
    <div class="mt-2"></div> 
    <el-pagination
      background
      layout="prev, pager, next"
      :total="totalPage"
      >
    </el-pagination>
  </div>
</template>


<script> 

export default {
  name: 'CustomerView',
  data() {
    return {  
    }
  }, 
  beforeMount() {  
    this.$store.dispatch('post/getAll')
  },
  computed: {  
    posts() {
      return this.$store.state.post.posts.data;
    },
    totalPage() {
      return this.$store.state.post.posts.total;
    }
  },
  methods: {  
  }
}

</script>