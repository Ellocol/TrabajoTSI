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

class autocaravanas(osv.Model):

    _name = 'autocaravanas'
    _description = 'Modulo de autocaravanas'
 
    _columns = {
            'identificador':fields.char('Id', size=10, required=True),    
            'name':fields.char('Nombre', size=64, required=True, readonly=False),
            'modelo':fields.char('Modelo', size=64, required=True, readonly=False),
            'alquiler_id':fields.one2many('alquiler','autocaravana_id','Alquiler'),
            'devolucion_id':fields.one2many('devolucion','autocaravana_id','Devolucion'),
            'reparaciones_ids': fields.many2many( 'reparacion','reparacion_autocaravana_rel','autocaravana_id', 'reparacion_id','Reparaciones'),
            'descuento_id': fields.many2one('descuento','Descuento'),
            'proveedor_id': fields.many2one('proveedor','Proveedor',required=True),
        }
