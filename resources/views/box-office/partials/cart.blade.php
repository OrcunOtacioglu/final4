<div class="modal fade" id="package" aria-labelledby="packageSidebar" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-simple modal-sm modal-sidebar">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">
                    Package
                    <span class="badge badge-pill badge-info">@{{ getItemCount() }}</span>
                </h4>
            </div>
            <div class="modal-body">
                <div class="list-group scrollable is-enabled scrollable-vertical" style="position: relative;">
                    <div data-role="container" class="scrollable-container" style="height: 270px; width: 358px;">
                        <div data-role="content" class="scrollable-content" style="width: 358px;">
                            <a v-for="item in items" class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem" @click="removeFromCart(item)">
                                <div class="media">
                                    <div class="pr-10">
                                        <i class="icon ti-ticket bg-blue-grey-500 white icon-circle" aria-hidden="true"></i>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="media-heading">@{{ item.category }}</h6>
                                        <small class="p-0">Row: @{{ item.row }}</small>
                                        <small class="p-0">Seat: @{{ item.number }}</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="scrollable-bar scrollable-bar-vertical scrollable-bar-hide" draggable="false">
                        <div class="scrollable-bar-handle" style="height: 202.693px;"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-success btn-block">
                    <i class="icon ti-money"></i> Sell Now
                </button>
                <button type="button" class="btn btn-outline-primary btn-block" onclick="cart.sendCardData()">
                    <i class="icon ti-save"></i> Book Now
                </button>
            </div>
        </div>
    </div>
</div>