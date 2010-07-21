<form method="post" action="{site_url}index.php/projects/filtered_results">
<div style=" width:720px; height:170px; border:1px solid #DAE0E4 " >  

<input type="hidden" name="nominal_plan_id" value="{nominal_plan_id}" /> 
<div style="float:left; width:120px; padding:4px; "> Search By Site Name:</div> 
<div style="float:left; width:100px; padding:4px; "><input name="s" value="" /></div> 
<br>
<br>
<!--<div style="float:left; width:40px; padding:4px; ">Select Filters</div> -->
<br>
<br>           
<div style="float:left; width:50px; padding:4px; ">District : </div> 
<div style="float:left; width:90px;"><select xml:lang="en" dir="ltr" name="district" id="district">
			   <option value="" > None </option>
			   {District}
			   <option value="{district}" >{district}</option>
			   {/District}
		    </select>
</div>
<div style="float:left; width:10px;"></div>

<div style="float:left; width:50px;">Bsc: </div>
<div style="float:left; width:90px;"><select xml:lang="en" dir="ltr" name="bsc" id="bsc">
			   <option value="" > None </option>
			   {Bsc}
			   <option value="{bsc}" >{bsc}</option>
			   {/Bsc}
		    </select>
</div>
<div style="float:left; width:10px;"></div>

<div style="float:left; width:50px;">Msc:</div>
<div style="float:left; width:90px;"><select xml:lang="en" dir="ltr" name="msc" id="msc">
			   <option value="" > None </option>
			   {Msc}
			   <option value="{msc}" >{msc}</option>
			   {/Msc}
		    </select>
</div>
<div style="float:left; width:10px;"></div>
<div style="float:left; width:50px;">Region: </div>
<div style="float:left; width:90px;"><select xml:lang="en" dir="ltr" name="region" id="region">
			   <option value="" > None </option>
			   {Region}
		   <option value="{region}" >{region}</option>
			   {/Region}
		    </select>
</div>
<div style="float:left; width:10px;"></div>
<div style="float:left; width:50px;">Phase: </div>
<div style="float:left; width:90px;"><select xml:lang="en" dir="ltr" name="phase" id="phase">
			   <option value="" > None </option>
			   {Phase}
			   <option value="{phase}" >{phase}</option>
			   {/Phase}
		    </select>
</div>
<div style="float:left; width:10px;"></div>
			<br>
			<br>
<div style="float:left; width:50px;  padding:4px;">Type:</div>
<div style="float:left; width:90px;"><select xml:lang="en" dir="ltr" name="type" id="type">
			   <option value="" > None </option>
			   {Type}
			   <option value="{type}" >{type}</option>
			   {/Type}
		    </select>
</div>
<div style="float:left; width:10px;"></div>
<div style="float:left; width:50px;">Capacity:</div>
<div style="float:left; width:90px;"><select xml:lang="en" dir="ltr" name="capacity" id="capacity">
			   <option value="" > None </option>
			   {Capacity}
			   <option value="{capacity}" >{capacity}</option>
			   {/Capacity}
		    </select>
</div>
<div style="float:left; width:10px;"></div>

<div style="float:left; width:50px; ">Division:</div>
<div style="float:left; width:90px; "><select xml:lang="en" dir="ltr" name="division" id="division">
			   <option value="" > None </option>
			   {Division}
			   <option value="{division}" >{division}</option>
			   {/Division}
		    </select>
</div>
<div style="float:left; width:10px;"></div>

<div style="float:left; width:50px;">Clutter:</div>
<div style="float:left; width:90px;"><select xml:lang="en" dir="ltr" name="clutter" id="clutter">
			   <option value="" > None </option>
			   {Clutter}
			   <option value="{clutter}" >{clutter}</option>
			   {/Clutter}
		    </select>
</div>
<div style="float:left; width:10px;"></div>
<br>
<br>
<div style="float:left; width:50px;"> <input type="button" id="b1" name="b1" value="Search" onclick="this.form.submit();" /> </div>

</div>
</form>
