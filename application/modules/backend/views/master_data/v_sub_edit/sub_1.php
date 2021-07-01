<div class="row">
   <div class="col-md-12">
      <div class="form-group">
         <table id="main-table" class="table table-bordered table-hover table-condensed mb-4">
            <thead>
               <tr>
                  <th class="text-center" colspan="4">PROVITAS SUB ROUND 1</th>
               </tr>
               <tr>
                  <th class="text-center">JANUARI</th>
                  <th class="text-center">FEBRUARI</th>
                  <th class="text-center">MARET</th>
                  <th class="text-center">APRIL</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'provitas[]','value'=>$detail->prov_januari, 'id' => 'provitas_januari', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'provitas[]','value'=>$detail->prov_februari, 'id' => 'provitas_februari', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'provitas[]','value'=>$detail->prov_maret, 'id' => 'provitas_maret', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'provitas[]','value'=>$detail->prov_april, 'id' => 'provitas_april', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
            </tbody>
         </table>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="form-group">
         <table id="main-table" class="table table-bordered table-hover table-condensed mb-4">
            <thead>
               <tr>
                  <th class="text-center" colspan="4">LUAS TANAM SUB ROUND 1</th>
               </tr>
               <tr>
                  <th class="text-center">JANUARI</th>
                  <th class="text-center">FEBRUARI</th>
                  <th class="text-center">MARET</th>
                  <th class="text-center">APRIL</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'lt[]','value'=>$detail->lt_januari, 'id' => 'lt_januari', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'lt[]','value'=>$detail->lt_februari, 'id' => 'lt_februari', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'lt[]','value'=>$detail->lt_maret, 'id' => 'lt_maret', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'lt[]','value'=>$detail->lt_april, 'id' => 'lt_aprl', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
            </tbody>
         </table>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="form-group">
         <table id="main-table" class="table table-bordered table-hover table-condensed mb-4">
            <thead>
               <tr>
                  <th class="text-center" colspan="4">LUAS PANEN SUB ROUND 1</th>
               </tr>
               <tr>
                  <th class="text-center">JANUARI</th>
                  <th class="text-center">FEBRUARI</th>
                  <th class="text-center">MARET</th>
                  <th class="text-center">APRIL</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'lp[]','value'=>$detail->lp_januari, 'id' => 'lp_januari', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'lp[]','value'=>$detail->lp_februari, 'id' => 'lp_februari', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'lp[]','value'=>$detail->lp_maret, 'id' => 'lp_maret', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'lp[]','value'=>$detail->lp_april, 'id' => 'lp_april', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
            </tbody>
         </table>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="form-group">
         <table id="main-table" class="table table-bordered table-hover table-condensed mb-4">
            <thead>
               <tr>
                  <th class="text-center" colspan="4">PRODUKSI SUB ROUND 1</th>
               </tr>
               <tr>
                  <th class="text-center">JANUARI</th>
                  <th class="text-center">FEBRUARI</th>
                  <th class="text-center">MARET</th>
                  <th class="text-center">APRIL</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'produksi[]','value'=>$detail->produksi_januari, 'id' => 'produksi_januari', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'produksi[]','value'=>$detail->produksi_februari, 'id' => 'produksi_februari', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'produksi[]','value'=>$detail->produksi_maret, 'id' => 'produksi_maret', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'produksi[]','value'=>$detail->produksi_april, 'id' => 'produksi_april', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
            </tbody>
         </table>
      </div>
   </div>
</div>