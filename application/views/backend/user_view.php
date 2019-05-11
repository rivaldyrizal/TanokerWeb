<!-- page content -->
        <div class="right_col" role="main">
          <div class="">

          <!-- page-title -->
           <div class="page-title">
              <div class="title_left">
                <h3>Managemen User</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <!-- end page-title -->

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tabel User <small>Wisata Tanoker</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                      <div class="row">
                        <form method="" action="<?php echo base_url('admin/user/input'); ?>">
                          <button id="submit-buttons" type="submit" class="btn btn-success btn-md pull-right">+ Tambah User</button>
                      </form>
                      </div>

                    <!-- <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p> -->
                    <div class="row">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">Id</th>
                            <th class="column-title">Nama User</th>
                            <th class="column-title">Username</th>
                            <th class="column-title">Email</th>
                            <th class="column-title">Role</th>
                            <th class="column-title">Status</th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php 
                          foreach ($list_user as $key => $value) { ?>
                             <tr class="even pointer">
                              <td class="a-center ">
                                <input type="checkbox" class="flat" name="table_records">
                              </td>
                              <td class=" "> <?php echo $value->id_user; ?> </td>
                              <td class=" "> <?php echo $value->nama_user; ?></td>
                              <td class=" ">  <?php echo $value->username; ?> </td>
                              <td class=" "><?php echo $value->email; ?></td>
                              <td class=" "><?php echo $value->role; ?></td>
                              <td class="a-right a-right "><?php echo $value->is_active; ?></td>
                              <td class=" last"><button type="button" class="btn btn-primary btn-xs">Edit</button><button type="button" class="btn btn-danger btn-xs">Hapus</button>
                              </td>
                            </tr>

                          <?php } ?>

                          <!-- <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">121000040</td>
                            <td class=" ">May 23, 2014 11:47:56 PM </td>
                            <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td>
                            <td class=" ">John Blank L</td>
                            <td class=" ">Paid</td>
                            <td class="a-right a-right ">$7.45</td>
                            <td class=" last"><button type="button" class="btn btn-primary btn-xs">Edit</button><button type="button" class="btn btn-danger btn-xs">Hapus</button>
                            </td>
                          </tr>
                          <tr class="odd pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">121000039</td>
                            <td class=" ">May 23, 2014 11:30:12 PM</td>
                            <td class=" ">121000208 <i class="success fa fa-long-arrow-up"></i>
                            </td>
                            <td class=" ">John Blank L</td>
                            <td class=" ">Paid</td>
                            <td class="a-right a-right ">$741.20</td>
                            <td class=" last"><button type="button" class="btn btn-primary btn-xs">Edit</button><button type="button" class="btn btn-danger btn-xs">Hapus</button>
                            </td>
                          </tr> -->
                        </tbody>
                      </table>
                    </div>
                  </div>
            
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        <!-- </div> -->
        <!-- /page content