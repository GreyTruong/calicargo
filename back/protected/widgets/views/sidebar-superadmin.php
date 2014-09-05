<aside class="bg-light lter b-r aside-md hidden-print" id="nav">          
    <section class="vbox">

        <section class="w-f scrollable">
            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">

                <!-- nav -->
                <nav class="nav-primary hidden-xs">
                    <ul class="nav">
                        <li >
                            <a href="<?php echo HelperUrl::baseUrl()?>admin"  >
                                <i class="fa fa-dashboard icon">
                                    <b class="bg-danger"></b>
                                </i>
                                <span>User</span>
                            </a>
                        </li>
                        
                        <li >
                            <a href="<?php echo HelperUrl::baseUrl()?>category"  >
                                <i class="fa fa-dashboard icon">
                                    <b class="bg-danger"></b>
                                </i>
                                <span>Category</span>
                            </a>
                        </li>
                        
                        <li >
                            <a href="#layout"  >
                                <i class="fa fa-columns icon">
                                    <b class="bg-warning"></b>
                                </i>
                                <span class="pull-right">
                                    <i class="fa fa-angle-down text"></i>
                                    <i class="fa fa-angle-up text-active"></i>
                                </span>
                                <span>Item</span>
                            </a>
                            <ul class="nav lt">
                                <li >
                                    <a href="<?php echo HelperUrl::baseUrl()?>stockin" >                                                        
                                        <i class="fa fa-angle-right"></i>
                                        <span>Stock-in</span>
                                    </a>
                                </li>
                                <li >
                                    <a href="<?php echo HelperUrl::baseUrl()?>item" >                                                        
                                        <i class="fa fa-angle-right"></i>
                                        <span>Item</span>
                                    </a>
                                </li>
                                <li >
                                    <a href="<?php echo HelperUrl::baseUrl()?>item/add" >                                                        
                                        <i class="fa fa-angle-right"></i>
                                        <span>Add Item</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                         <li >
                            <a href="<?php echo HelperUrl::baseUrl()?>order"  >
                                <i class="fa fa-dashboard icon">
                                    <b class="bg-danger"></b>
                                </i>
                                <span>Order</span>
                            </a>
                        </li>
                          <li >
                      <a href="<?php echo HelperUrl::BaseUrl() . 'ship-order-management'; ?>"  >
                        <i class="fa fa-dollar icon">
                          <b class="bg-info"></b>
                        </i>
                        <span class="pull-right">
                        <i class="fa fa-angle-down text"></i>
                        <i class="fa fa-angle-up text-active"></i>
                      </span>
                        <span>Order</span>
                      </a>
                      <ul class="nav lt">                        
                      <li >
                        <a href="<?php echo HelperUrl::BaseUrl() . 'ship-order-management'; ?>"  >
                          <i class="fa fa-angle-right"></i>
                          <span>List Order</span>
                        </a>
                      </li>
                      <li >
                        <a href="<?php echo HelperUrl::BaseUrl() . 'add-ship-order'; ?>"  >
                          <i class="fa fa-angle-right"></i>
                          <span>Create Order</span>
                        </a>
                      </li>
                      <li >
                        <a href="<?php echo HelperUrl::BaseUrl() . 'ship-order-report'; ?>"  >
                          <i class="fa fa-angle-right"></i>
                          <span>Export Order</span>
                        </a>
                      </li>
                      <li >
                        <a href="<?php echo HelperUrl::BaseUrl() . 'ship-order-transaction'; ?>"  >
                          <i class="fa fa-angle-right"></i>
                          <span>Report History</span>
                        </a>
                      </li>
                    </ul>
                    </li>                                        
                    <li >
                    <a href="#"  >
                      <i class="fa fa-columns icon">
                        <b class="bg-warning"></b>
                      </i>
                      <span class="pull-right">
                        <i class="fa fa-angle-down text"></i>
                        <i class="fa fa-angle-up text-active"></i>
                      </span>
                      <span>Outcome</span>
                    </a>
                    <ul class="nav lt">                        
                      <li >
                        <a href="<?php echo HelperUrl::BaseUrl() . 'outcome-add'; ?>"  >                                                       
                          <i class="fa fa-angle-right"></i>
                          <span>Add outcome</span>
                        </a>
                      </li>
                      <li >
                        <a href="<?php echo HelperUrl::BaseUrl() . 'outcome-management'; ?>"  >
                          <i class="fa fa-angle-right"></i>
                          <span>Management</span>
                        </a>
                      </li>
                    </ul>
                  </li>
                        
                    </ul>
                </nav>
                <!-- / nav -->
            </div>
        </section>
        <footer class="footer lt hidden-xs b-t b-light">
            <div id="chat" class="dropup">
                <section class="dropdown-menu on aside-md m-l-n">
                    <section class="panel bg-white">
                        <header class="panel-heading b-b b-light">Active chats</header>
                        <div class="panel-body animated fadeInRight">
                            <p class="text-sm">No active chats.</p>
                            <p><a href="#" class="btn btn-sm btn-default">Start a chat</a></p>
                        </div>
                    </section>
                </section>
            </div>
            <div id="invite" class="dropup">                
                <section class="dropdown-menu on aside-md m-l-n">
                    <section class="panel bg-white">
                        <header class="panel-heading b-b b-light">
                            John <i class="fa fa-circle text-success"></i>
                        </header>
                        <div class="panel-body animated fadeInRight">
                            <p class="text-sm">No contacts in your lists.</p>
                            <p><a href="#" class="btn btn-sm btn-facebook"><i class="fa fa-fw fa-facebook"></i> Invite from Facebook</a></p>
                        </div>
                    </section>
                </section>
            </div>
            <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-default btn-icon">
                <i class="fa fa-angle-left text"></i>
                <i class="fa fa-angle-right text-active"></i>
            </a>
            <div class="btn-group hidden-nav-xs">
                <button type="button" title="Chats" class="btn btn-icon btn-sm btn-default" data-toggle="dropdown" data-target="#chat"><i class="fa fa-comment-o"></i></button>
                <button type="button" title="Contacts" class="btn btn-icon btn-sm btn-default" data-toggle="dropdown" data-target="#invite"><i class="fa fa-facebook"></i></button>
            </div>
        </footer>
    </section>
</aside>