<div class="row">
   <div class="col-md-12">
      <div class="form-group">
         <table id="main-table" class="table table-bordered table-hover table-condensed mb-4">
            <thead>
               <tr>
                  <th class="text-center" colspan="4">PROVITAS SUB ROUND 2</th>
               </tr>
               <tr>
                  <th class="text-center">MEI</th>
                  <th class="text-center">JUNI</th>
                  <th class="text-center">JULI</th>
                  <th class="text-center">AGUSTUS</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'provitas[]','value'=>$detail->prov_mei, 'id' => 'provitas_mei', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'provitas[]','value'=>$detail->prov_juni, 'id' => 'provitas_juni', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'provitas[]','value'=>$detail->prov_juli, 'id' => 'provitas_juli', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'provitas[]','value'=>$detail->prov_agustus, 'id' => 'provitas_agustus', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
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
                  <th class="text-center" colspan="4">LUAS TANAM SUB ROUND 2</th>
               </tr>
               <tr>
                  <th class="text-center">MEI</th>
                  <th class="text-center">JUNI</th>
                  <th class="text-center">JULI</th>
                  <th class="text-center">AGUSTUS</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'lt[]','value'=>$detail->lt_mei, 'id' => 'lt_mei', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'lt[]','value'=>$detail->lt_juni, 'id' => 'lt_juni', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'lt[]','value'=>$detail->lt_juli, 'id' => 'lt_juli', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'lt[]','value'=>$detail->lt_agustus, 'id' => 'lt_aprl', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
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
                  <th class="text-center" colspan="4">LUAS PANEN SUB ROUND 2</th>
               </tr>
               <tr>
                  <th class="text-center">MEI</th>
                  <th class="text-center">JUNI</th>
                  <th class="text-center">JULI</th>
                  <th class="text-center">AGUSTUS</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'lp[]','value'=>$detail->lp_mei, 'id' => 'lp_mei', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'lp[]','value'=>$detail->lp_juni, 'id' => 'lp_juni', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'lp[]','value'=>$detail->lp_juli, 'id' => 'lp_juli', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'lp[]','value'=>$detail->lp_agustus, 'id' => 'lp_agustus', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
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
                  <th class="text-center" colspan="4">PRODUKSI SUB ROUND 2</th>
               </tr>
               <tr>
                  <th class="text-center">MEI</th>
                  <th class="text-center">JUNI</th>
                  <th class="text-center">JULI</th>
                  <th class="text-center">AGUSTUS</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'produksi[]','value'=>$detail->produksi_mei, 'id' => 'produksi_mei', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'produksi[]','value'=>$detail->produksi_juni, 'id' => 'produksi_juni', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'produksi[]','value'=>$detail->produksi_juli, 'id' => 'produksi_juli', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
                  <td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'produksi[]','value'=>$detail->produksi_agustus, 'id' => 'produksi_agustus', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
            </tbody>
         </table>
      </div>
   </div>
</div>