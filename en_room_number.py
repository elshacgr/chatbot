# -*- coding: utf-8 -*-
"""
Created on input_stringn Sep 19 02:15:09 2022

@author: Venisa Tewu
"""

import re
# from ordinal2num_test import *
from word2num_test import *
import word2num_test

class entity_room_number:
    
    def __init__(self):
        self.units             = 'nol|kosong|pertama|satu|dua|tiga|empat|lima|enam|tujuh|delapan|sembilan|sepuluh|seratus|sebelas|seratus'
        self.scales            = 'belas|puluh|ratus' 
        self.room              = r'\bkamar|bilik|room|ruangan\b'

        self.convertWordNumber = wordNum()
        
        
    def get_room_number(self, input_string):          
        pattern_1    = '('+self.units+')'
        pattern_2    = '('+self.units+'|'+self.scales+')'
        # pattern
        kamar        = '('+self.room+')'
        space        = '\s'
    
        #Pattern for recognize number of room
        pattern      = '('+kamar+space+pattern_1+space+pattern_2+space+pattern_1+space+pattern_2+')|'+'('+kamar+space+pattern_1+space+pattern_2+space+pattern_1+space+pattern_2+')|'+'('+kamar+space+pattern_1+space+pattern_2+space+pattern_1+')|'+'('+pattern_1+space+pattern_2+space+pattern_1+space+pattern_2+')|'+'('+pattern_1+space+pattern_2+space+pattern_1+space+pattern_2+')|'+'('+pattern_1+space+pattern_2+space+pattern_1+')'

        #Change all input string to lowercase
        input_string = input_string.casefold()
        
        #List declaration
        collect      = []
        
        #Convert untuk extract entity dari full-string
        count = 0
        display = re.finditer(pattern, input_string)
        for match in display:
            count +=1
            
            # Replace 'nol' and 'kosong' to 'ratus'
            def replace_all(text, dic):
                for i, j in dic.items():
                    text = text.replace(i, j)
                return text
            zero_dict = { 'kosong': 'nol', 'nol': 'ratus'}
            replace_zero = replace_all(match.group(), zero_dict)
            
            #Convert all textual numbeer to numeric
            get_roomNum = self.convertWordNumber.text2int(replace_zero.casefold())
            
            #Count all specific type in string
            roomNum_count = ('<noKamar%d>' % count)
            
            #Remove room-dict from entity to put in Value (take only value)
            val = re.sub(kamar , '', get_roomNum)
            value = val.replace(' ', '')
            
            dict_dom = {
                'Entity'        : ''+match.group(0),
                'StartIndex'    : match.start(),
                'EndIndex'      : match.end(),
                'Type'          : roomNum_count,
                'Value'         : ''+value
                }
            
            collect.append(dict_dom)
        
        return collect
       
        #Convert untuk ditampilkan di full-string
        # input_string = input_string.replace(',', ' ,') #jadi koma displit dulu sebulum dipanggil untuk ditampilkan hasil convert ke dalam string
        # curstring = self.convertWordNumber.text2int(input_string) #ERROR atau #JADI tapi harus split koma:,
        # curstring = curstring.replace(' ,', ',') #setelah berhasil diconvert, sambungkan kembali komanya ke string atau convert angka (ketempat semula)
        # print('\n')
        # print('Output: ', curstring)
   

def main():
    entity_system_noKamar = entity_room_number()
           
    input_string = 'dua ratus satu, kamar dua kosong satu, kamar dua nol satu'
    print('Input: \n{0}'.format(input_string))
    
    result_entity = entity_system_noKamar.get_room_number(input_string)
    print('\nEntity: \n{0}'.format(result_entity))
 

if __name__ == "__main__" :
      main()