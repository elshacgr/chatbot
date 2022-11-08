# -*- coding: utf-8 -*-
"""
Created on Wed Oct 19 00:23:17 2022

@author: Venisa Tewu
"""

import re
from word2num_test import *
import word2num_test

class entity_bed_position:
    
    def __init__(self):
        self.units             = 'nol|pertama|satu|dua|tiga|empat|lima|enam|tujuh|delapan|sembilan|sepuluh|seratus'
        self.bed               = r'\b[A]|[a]|[B]|[b]\b'

        self.convertWordNumber = wordNum()
        
        
    def get_bed_position(self, input_string):          
        pattern_1    = '('+self.units+')'
        bed       = '('+self.bed+')'
        space        = '\s'
   
        #Pattern for recognize bed position
        pattern      = '('+pattern_1+space+bed+')'

        #Change all input string to lowercase
        # input_string = input_string.casefold()
        
        #List declaration
        collect      = []
        
        #Convert untuk extract entity dari full-string
        count = 0
        display = re.finditer(pattern, input_string)
        for match in display:
            count +=1
            
            #Change all input string to lowercase
            input_string = input_string.casefold()
            
            #Convert all textual numbeer to numeric
            get_bedPosition = self.convertWordNumber.text2int(match.group().casefold())
            
            #Count all specific type in string
            bed_count = ('<posisiBed%d>' % count)
            
            value = get_bedPosition
            
            dict_dom = {
                'Entity'        : ''+match.group(0),
                'StartIndex'    : match.start(),
                'EndIndex'      : match.end(),
                'Type'          : bed_count,
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
    entity_system_bed_position = entity_bed_position()
           
    input_string = 'dua b, dua A.'
    print('Input string: \n{0}'.format(input_string))

    result_entity = entity_system_bed_position.get_bed_position(input_string)
    print('\nEntity: \n{0}'.format(result_entity))

if __name__ == '__main__' :
      main()