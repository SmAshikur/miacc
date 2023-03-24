<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Transaction Component</div>
                    <div class="card-body p-2">
                      <div>
                      <ul>
                          <li v-for="item in heads" :key="item.id">
                            {{ item.group_name }}
                            <ul>
                                <li v-for="item1 in item.children" :key="item1.id">
                                    {{ item1.group_name }}
                                    <ul>
                                        <li v-for="item2 in item1.children" :key="item2.id">
                                            {{ item2.group_name }}
                                            <ul>
                                                <li v-for="item3 in item2.head" :key="item3.id">
                                                    {{ item3.account_head }}

                                                </li>
                                            </ul>
                                        </li>
                                        <li v-for="item2 in item1.head" :key="item2.id">
                                                {{ item2.account_head }}
                                        </li>
                                    </ul>
                                </li>
                                <li v-for="item1 in item.head" :key="item1.id">
                                    {{ item1.account_head }}
                                </li>
                            </ul>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="card-body p-5">
                        <table class="table bordered stripped">
                            <thead>
                                <tr>
                                    <th>Acc Head Id</th>
                                    <th>G. Lvl 1</th>
                                    <th>G. Lvl 2</th>
                                    <th>G. Lvl 3</th>
                                    <th>Acc Head </th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in trans" :key="index">
                                    <td>{{ item.id }}</td>

                                    <td>{{ item.head.group!=null ?
                                        item.head.group.group_name:''}}</td>
                                    <td>{{ item.head.group!=null && item.head.group.group!=null ?
                                        item.head.group.group.group_name:''}}</td>
                                    <td>{{ item.head.group!=null && item.head.group.group!=null &&
                                      item.head.group.group.group !=null ?item.head.group.group.group.group_name:''}}</td>

                                    <td>{{ item.head!=null ?item.head.account_head:'' }}</td>

                                    <td>{{ item.debit-item.credit}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  import axios from 'axios';

  export default {
    data() {
      return {
        trans:[],
        heads:[]
      }
    },
    methods: {
      fetchData() {
        axios.get('http://localhost:8000/api/trans')
          .then(response => {

            this.trans=response.data
            console.log(this.trans);
          })
          .catch(error => {
            console.log(error);
          });
      },
      fetchHead() {
        axios.get('http://localhost:8000/api/group')
          .then(response => {

            this.heads=response.data
            console.log(this.heads);
          })
          .catch(error => {
            console.log(error);
          });
      }
    },
    mounted() {
      this.fetchData();
      this.fetchHead();
    }
  }
</script>
