<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="card-header">Daftar user</div>
              <!-- <div class="list-group">
                    <a class="list-group-item" v-for="category in users" v-bind:key="category.id">
                        {{ category.name }}
                    </a>
              </div> -->
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-condensed tfix">
                  <thead align="center">
                    <tr>
                      <td>
                        <b>ID</b>
                      </td>
                      <td>
                        <b>Nama</b>
                      </td>
                      <td>
                        <b>Emails</b>
                      </td>
                      <td>
                        <b>Roles</b>
                      </td>
                    </tr>
                  </thead>
                  <tbody v-for="user in users" :key="user.id">
                      <tr >
                      <TD>{{user.id}}</TD>
                      <TD>{{user.name}}</TD>
                      <td>{{user.email}}</td>
                      <td>{{user.roles}}</td>
                      </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
        created() {
            this.loadUsers();

        },
        methods: {
            loadUsers() {
                axios({
                method: 'get',
                url: 'api/customer_api'
                })
                .then((response) => {
                    this.users = (response.data);
                    this.forceRerender();

                })
                .catch(function (error) {
                    console.log(error);
                    window.alert(error.toString());
                });
            },
            forceRerender() {
            this.renderComponent = false;


            this.$nextTick().then(() => {
                this.renderComponent = true;
            });
            }
        },
        data() {
            return {
                users : [],
                renderComponent: true
                }
        }
    }
</script>
