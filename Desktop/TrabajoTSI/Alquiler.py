# -*- encoding: utf-8 -*-
##############################################################################
#
#    OpenERP, Open Source Management Solution
#    Copyright (C) 2004-2010 Tiny SPRL (http://tiny.be). All Rights Reserved
#    
#
#    This program is free software: you can redistribute it and/or modify
#    it under the terms of the GNU General Public License as published by
#    the Free Software Foundation, either version 3 of the License, or
#    (at your option) any later version.
#
#    This program is distributed in the hope that it will be useful,
#    but WITHOUT ANY WARRANTY; without even the implied warranty of
#    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#    GNU General Public License for more details.
#
#    You should have received a copy of the GNU General Public License
#    along with this program.  If not, see http://www.gnu.org/licenses/.
#
##############################################################################

from osv import osv
from osv import fields

class alquiler(osv.Model):

    _name = 'alquiler'
    _description = 'Alquiler de autocaravanas'
 
    _columns = {
            'id_cards':fields.char('Id', size=9, required=True),         
            'importe':fields.float('importe',required=True),
            'fecha_Alquiler': fields.date('Fecha alquiler',required=True, autodate = True),
            'fecha_fin': fields.date('Fecha fin',required=True, autodate = True),
            'cliente_id': fields.many2one('cliente','Cliente', required=True),
            'autocaravana_id':fields.many2one('autocaravanas','Autocaravana', required=True),
            'empleado_id': fields.many2one('empleado','Empleado', required=True),
            'state':fields.selection([('solicitado', 'Solicitado'),('admitido', 'Admitido'), ('cancelado', 'Cancelado'),('realizado','Realizado')], 'Estados'),
        }
    _defaults = {'state':'solicitado'}