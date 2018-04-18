from os import listdir
from os.path import isfile, join

def do_exist(path):
    return any(isfile(join(path, i)) for i in listdir(path))
    print("it esxist")


pa = '/opt/lampp/htdocs/lottery/lottery_web/photo/'
do_exist(pa)