from word2num_test import *
import word2num_test
import numpy as np

class entity_jumlahKamar:
    
    def __init__(self):
        self.units        = "nol|pertama|satu|dua|tiga|empat|lima|enam|tujuh|delapan|sembilan|sepuluh|seratus" #tambah yang sebutan "dua nol satu" atau "dua kosong satu"
        self.scales       = "belas|puluh|ratus|ribu|juta|miliar|triliun" 
        self.jmlhKamar    = "kamar|room|ruangan|tampa"
        # self.kamarAsrama  = "jasmine|annex|bougenville|crystal|guest house|edelweiss"
        self.person       = "saya|kita|ta|mama|papa|kaka|oma|opa|tamang|orang|ade"
        self.kota         = "banda aceh|langsa|lhokseumawe|sabang|subulussalam|binjai|gunungsitoli|medan|padang sidempuan|pematangsiantar|sibolga|tanjung balai|tebing tinggi|lubuklinggau|pagar alam|palembang|prabumulih|sekayu|bukittinggi|padang|padang panjang|pariaman|payakumbuh|sawahlunto|solok|sungai penuh|jambi|bandung|bekasi|bogor|cimahi|cirebon|depok|sukabumi|tasikmalaya|banjar|magelang|pekalongan|salatiga semarang|surakarta|tegal|semarang|batu|blitar|kediri|mojokerto|malang|madiun|surabaya|probolinggo|pasuruan|jakarta pusat|jakarta barat|jakarta timur|jakarta utara|jakarta selatan|yogyakarta|cilegon|serang|tangerang|tangerang selatan|pangkal pinang|bengkulu|pontianak|singkawang|banjarbaru|banjarmasin|palangkaraya|balikpapan|bontang|samarinda|tarakan|batam|tanjung pinang|bandar lampung|metro|ternate|tidore kepulauan|ambon|tual|bima|mataram|kupang|denpasar|makassar|palopo|parepare|palu|baubau|kendari|bitung|kotamobagu|manado|tomohon|gorontalo|sorong|jayapura|dumai|pekanbaru"
        self.lantai       = "lante|lantai" # second floor
        self.date         = "pagi|siang|sore|malam"
        self.noKamar      = "kamar"
        self.convertWordNumber = wordNum()
        
    def convert_word2Num(self, mo):     
        pola1 = "("+self.units+")"
        pola2 = "("+self.units+"|"+self.scales+")"
        space = "\s"
        allPola = "("+pola1+space+pola2+space+pola2+space+pola2+space+pola2+")|"+"("+pola1+space+pola2+space+pola2+space+pola2+")|"+"("+pola1+space+pola2+space+pola2+")|"+"("+pola1+space+pola2+")|"+"("+pola1+")" #one words
        
        count = 0
        mo = mo.casefold()
        
        #Convert untuk ditampilkan di full-string
        mo = mo.replace(",", " ,") #jadi koma displit dulu sebulum dipanggil untuk ditampilkan hasil convert ke dalam string
        curstring = self.convertWordNumber.text2int(mo) #ERROR atau #JADI tapi harus split koma:,
        curstring = curstring.replace(" ,", ",") #setelah berhasil diconvert, sambungkan kembali komanya ke string atau convert angka (ketempat semula)
        # print("Convert: ", curstring) # detect digit yang bentuk textual
        print("\n")

        #Convert untuk extract entity dari full-string
        for match in re.finditer(allPola,mo):
            count += 1
            getNumber = self.convertWordNumber.text2int(match.group().casefold()) # untuk convert huruf to number
            digitCount = ("DIGIT%d" % count)
            # print("Entity:", match.group(0), "Start Index:", match.start(), "End Index:", match.end(), "Type:", digitCount, "Value:", getNumber)
    
        return curstring
    
    def entity_jmlhKamar(self, curstring):
        curstring = curstring.casefold()
        
        getJmlh = self.convert_word2Num(curstring)
        
        hitung = 0
        
        ##### ReGex for entity jumlah kamar #####
        kamar = "("+self.jmlhKamar+")"
        space = "\s"
        num   = "\d"
        allpola = "("+num+space+kamar+")|"+"("+num+kamar+")"
        
        collect =[]

        for match in re.finditer(allpola, getJmlh):
            hitung +=1
            # entityKamarCount = ("KAMAR%d" % hitung)
            getValue = match.group()
            collect.append(['Entity:'+match.group(0) + ';StartIndex:'+str(match.start()) + ';EndIndex:'+str(match.end()) + ';Type: <jumlahKamar>' + ';Value:'+getValue])
            
        a = np.array(collect, dtype="object")
          
        return collect


    def entity_Kota(self, curstring):
        curstring = curstring.casefold()
        
        getJmlh = self.convert_word2Num(curstring)
        
        hitung = 0
        
        ##### ReGex for entity jumlah kamar #####
        kamar = "("+self.kota+")"
        space = "\s"
        num   = "\d" #manipulasi supaya bisa detect number lebih dari satu
        allpola = "("+space+kamar+")"#regex ini diatur lagi
    
    
        collect = []
    
        for match in re.finditer(allpola, getJmlh):
            hitung +=1
            # entityKotarCount = ("KOTA%d" % hitung)
            getValue = match.group()
            collect.append(['Entity:'+match.group(0) + ';StartIndex:'+str(match.start()) + ';EndIndex:'+str(match.end()) + ';Type: <KOTS>' + ';Value:'+getValue])
            
        a = np.array(collect, dtype="object")
          
        return collect
    
             
# def main():
#     entity_jmlhKamar = entity_jumlahKamar()
           
#     mo = ' kita pesan dua kamar dan 3 kamar'

#     print("Input: ", mo)
    
#     # print(entity_jmlhKamar.entity_kamarAsrama(mo))
#     print(entity_jmlhKamar.entity_jmlhKamar(mo))

#     # print(entity_jmlhKamar.entity_jmlhKamar(mo)) #sepuluh hanya terconvert menjadi --> 0 karena hanya satu \d

# if __name__ == "__main__" :
#       main()