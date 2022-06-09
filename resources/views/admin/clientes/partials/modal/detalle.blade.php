								 <!--DETALLES--------------------------->
                                 <div class="modal fade" id="data-{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document" style="max-width: 800px">
                                            <div class="modal-content">
                                               <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Venta procesada</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding:0px">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php
                                                    
                                                    $user = App\Models\User::where('id','=',$c->iduser)
                                                    ->first();

                                                   
                                                    
                                                    ?>
                                                    
                                                <table class="table table-responsive-sm table-hover table-outline mb-0 table-sm">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th class="text-center">Producto</th>
                                                            <th class="text-center">Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                   
                                                        <tbody>
                                                            <tr>
                                                                <td>{{$c->descripcion}}</td>
                                                               
                                                                <td> {{ number_format(  $detalle_venta,2 )  }}$</td>
                                                            </tr>
                                                        </tbody>
                                                   
                                                    <tfoot class="thead-light">
                                                        <th>
                                                            <b>Total:</b>
                                                        </th>
                                                        <th> {{ number_format(  $detalle_venta,2 )  }}$</th>
                                                    </tfoot>
                                                </table>
                                                <div class="modal-footer">
                                    
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>