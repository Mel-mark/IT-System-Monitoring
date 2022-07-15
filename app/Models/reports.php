<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reports extends Model
{
    use HasFactory;

    protected $fillable = [
        's_description',
        'l_description',
        'name',
        'comment',
        'pri_level',
        'ass_personel',
        'created_at'];

        public function scopeDateFilter( $data, $from_date=null,$to_date=null, $System,$Status,$Personel ){
        
            if( !empty( $from_date ) ){
                $from_date = date('Y-m-d 00:00:01', strtotime( $from_date ) );
    
                $to_date = ( !empty( $to_date ) )? date('Y-m-d 23:59:59', strtotime( $to_date ) ) : date('Y-m-d 23:59:59' );
              
            
                if($Status == 'All'){

                    // if personle == All 
                        if($Personel == 'All'  )
                        {   
                            if($System  == 'All'){
                              
                                    $data->whereBetween('created_at', [$from_date, $to_date])->where('status','!=','Ongoing')->orderBy('created_at','ASC');
                            }else{
                                $data->where('status','!=','Ongoing')->whereBetween('created_at', [$from_date, $to_date])->where('system','=',$System)->orderBy('created_at','ASC');
                            }
                        }else{
                            if($System  == 'All'  ){
                                $data->where('status','!=','Ongoing')->whereBetween('created_at', [$from_date, $to_date])->where('ass_personel','=',$Personel)->orderBy('created_at','ASC');
                            }else{
                                $data->where('status','!=','Ongoing')->whereBetween('created_at', [$from_date, $to_date])->where('ass_personel','=',$Personel)->where('system','=',$System)->orderBy('created_at','ASC');
                                
                            }
                        }
                }else{
                        if($Personel == 'All'  )
                        {
                            if($System  == 'All'  ){
                                $data->whereBetween('created_at', [$from_date, $to_date])->where('status','=',$Status)->orderBy('created_at','ASC');
                            }else{
                                $data->whereBetween('created_at', [$from_date, $to_date])->where('status','=',$Status)->where('system','=',$System)->orderBy('created_at','ASC');
                            }
                        }else{
                            if($System  == 'All'  ){
                                $data->whereBetween('created_at', [$from_date, $to_date])->where('status','=',$Status)->where('ass_personel','=',$Personel)->orderBy('created_at','ASC');
                            }else{
                                $data->whereBetween('created_at', [$from_date, $to_date])->where('status','=',$Status)->where('ass_personel','=',$Personel)->where('system','=',$System)->orderBy('created_at','ASC');
                            }
                           
                        }
                }
            }else{
                        if($Status == 'All' ){
                            // if personle == All 
                                if($Personel == 'All'  )
                                {
                                    if($System  == 'All'  ){
                                        $data->where('status','!=','Ongoing')->orderBy('created_at','ASC');
                                    }else{
                                        $data->where('status','!=','Ongoing')->where('system','=',$System)->orderBy('created_at','ASC');
                                    }
                                }else{
                                    if($System  == 'All'  ){
                                        $data->where('status','!=','Ongoing')->where('ass_personel','=',$Personel)->orderBy('created_at','ASC');
                                    }else{
                                        $data->where('status','!=','Ongoing')->where('ass_personel','=',$Personel)->where('system','=',$System)->orderBy('created_at','ASC');
                                    }
                                }
                        }else{
                                if($Personel == 'All'  )
                                {
                                    if($System  == 'All'  ){
                                        $data->where('status','=',$Status)->orderBy('created_at','ASC');
                                    }else{
                                        $data->where('status','=',$Status)->where('system','=',$System)->orderBy('created_at','ASC');
                                    }
                                }else{
                                    if($System  == 'All'  ){
                                        $data->where('status','=',$Status)->where('ass_personel','=',$Personel)->orderBy('created_at','ASC');
                                    }else{
                                        $data->where('status','=',$Status)->where('ass_personel','=',$Personel)->where('system','=',$System)->orderBy('created_at','ASC');
                                    }
                                }
                        }
            }
          
            return $data;
        }

}
