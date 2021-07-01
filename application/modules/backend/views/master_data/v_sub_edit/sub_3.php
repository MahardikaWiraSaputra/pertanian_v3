<div class="row">
   <div class="col-md-12">
      <div class="form-group">
         <table id="main-table" class="table table-bordered table-hover table-condensed mb-4">
            <thead>
               <tr>
                  <th class="text-center" colspan="4">PROVITAS SUB ROUND 3</th>
               </tr>
               <tr>
                  <th class="text-center">SEPTEMBER</th>
                  <th class="text-center">OKTOBER</th>
                  <th class="text-center">NOVEMBER</th>
                  <th class="text-center">DESEMBER</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'provitas[]','value'=>$detail->prov_september, 'id' => 'provitas_september', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'provitas[]','value'=>$detail->prov_oktober, 'id' => 'provitas_oktober', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'provitas[]','value'=>$detail->prov_november, 'id' => 'provitas_november', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'provitas[]','value'=>$detail->prov_desember, 'id' => 'provitas_desember', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
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
                  <th class="text-center" colspan="4">LUAS TANAM SUB ROUND 3</th>
               </tr>
               <tr>
                  <th class="text-center">SEPTEMBER</th>
                  <th class="text-center">OKTOBER</th>
                  <th class="text-center">NOVEMBER</th>
                  <th class="text-center">DESEMBER</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'lt[]','value'=>$detail->lt_september, 'id' => 'lt_september', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'lt[]','value'=>$detail->lt_oktober, 'id' => 'lt_oktober', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'lt[]','value'=>$detail->lt_november, 'id' => 'lt_november', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'lt[]','value'=>$detail->lt_desember, 'id' => 'lt_aprl', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
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
                  <th class="text-center" colspan="4">LUAS PANEN SUB ROUND 3</th>
               </tr>
               <tr>
                  <th class="text-center">SEPTEMBER</th>
                  <th class="text-center">OKTOBER</th>
                  <th class="text-center">NOVEMBER</th>
                  <th class="text-center">DESEMBER</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'lp[]','value'=>$detail->lp_september, 'id' => 'lp_september', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'lp[]','value'=>$detail->lp_oktober, 'id' => 'lp_oktober', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'lp[]','value'=>$detail->lp_november, 'id' => 'lp_november', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'lp[]','value'=>$detail->lp_desember, 'id' => 'lp_desember', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
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
                  <th class="text-center" colspan="4">PRODUKSI SUB ROUND 3</th>
               </tr>
               <tr>
                  <th class="text-center">SEPTEMBER</th>
                  <th class="text-center">OKTOBER</th>
                  <th class="text-center">NOVEMBER</th>
                  <th class="text-center">DESEMBER</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'produksi[]','value'=>$detail->produksi_september, 'id' => 'produksi_september', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'produksi[]','value'=>$detail->produksi_oktober, 'id' => 'produksi_oktober', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'produksi[]','value'=>$detail->produksi_november, 'id' => 'produksi_november', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'produksi[]','value'=>$detail->produksi_desember, 'id' => 'produksi_desember', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
            </tbody>
         </table>
      </div>
   </div>
</div>