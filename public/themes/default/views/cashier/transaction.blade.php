<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular.min.js"></script>
    <div class="row">
        <div class="col-md-8">
            <div class="box-details">
                <div class="left-box-status">
                    asdasd
                </div>
                <span class="number">2</span>
                <div class="con-det">
                    <span>Lorem ipsum</span>
                    <p style="margin:0">Lorem ipsum</p>
                    <span>Lorem ipsum</span>
                </div>
                <span class="con" style="float:right">sdasd</span>
            </div>
            <div class="container-list">
                @foreach(json_decode($list) as $li)
                <div class="box-details-list">
                    <div class="container-li-detail">
                        <p class="qty-det">{{$li->id}}</p>
                        <p style="margin:0">asdas</p>
                        <span>sadasd</span>
                        <span class="p-det">sadasd</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-4">
            <div class="box-details-left">
                <div class="ul-container"  data-ng-app="">
                    <ul>
                        <li>
                            <span>Lorem ipsum</span><span style="float:right">P ipsum</span>
                        </li>
                        <li>
                            <span>Lorem ipsum</span><span style="float:right">P ipsum</span>
                        </li>
                        <li>
                            <span>Lorem ipsum</span><span style="float:right">P ipsum</span>
                        </li>
                        <li>
                            <span>Lorem ipsum</span><span style="float:right">{{$total}}</span>
                        </li>
                        <li>
                            <span>Lorem ipsum</span><span style="float:right">@{{cash - total}}</span>
                        </li>
                        <li data-ng-app="" data-ng-init="total={{$total}}">
                            <hr>
                            <input type="text" ng-model="cash">
                        </li>
                        <li>
                            <hr>
                            <button class="btn btn-paid">lorem</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
-->


<div class="content-box-large">

    <div class="panel-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                   <h5>Billing Address</h5>
                   <address>
                       Stanley Jones <br>
                       795 Folsom Ave, Suite 600 <br>
                       San Francisco, CA 94107 <br>
                       P: (123) 456-7890
                   </address>
                </div>
                <div class="col-md-6">
                    <div class="pull-right" style="text-align: right;margin-top: 12px;">
                        <p><strong>Order Date:</strong><i> May 17, 2017</i></p>
                        <p><strong>Order Status:</strong><i> Paid</i></p>
                        <p><strong>Order ID:</strong><i> #158450</i></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>63</td>
                        <td>2011/07/25</td>
                        <td>$170,750</td>
                    </tr>
                    <tr>
                        <td>Ashton Cox</td>
                        <td>Junior Technical Author</td>
                        <td>San Francisco</td>
                        <td>66</td>
                        <td>2009/01/12</td>
                        <td>$86,000</td>
                    </tr>
                    </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6">
                    <div class="pull-right" style="text-align: right;">
                        <p><strong>Sub-total:</strong><i> $4120.00</i></p>
                        <p><strong>VAT (12.5):</strong><i> $515</i></p>
                        <h3>$4635.00 USD</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="pull-right">
                        <button type="button" class="btn btn-success">Success</button>
                        <button type="button" class="btn btn-secondary">Secondary</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <small>
                        PLEASE NOTE: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur consequuntur eveniet ipsam iure labore nemo pariatur perferendis quaerat quidem similique. Alias earum facere magni nam odio rem suscipit voluptatibus! Alias, consequatur distinctio dolore ducimus eaque est eveniet labore minus nam officiis placeat qui, quod quos repellat repellendus suscipit velit, voluptatem. Alias earum facere magni nam odio rem suscipit voluptatibus! Alias, consequatur distinctio dolore ducimus eaque est eveniet labore minus nam officiis placeat qui, quod quos repellat repellendus suscipit velit, voluptatem.

                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur consequuntur eveniet ipsam iure labore nemo pariatur perferendis quaerat quidem similique. Alias earum facere magni nam odio rem suscipit voluptatibus! Alias, consequatur distinctio dolore ducimus eaque est eveniet labore minus nam officiis placeat qui, quod quos repellat repellendus suscipit velit, voluptatem.
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>