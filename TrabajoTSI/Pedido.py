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

class pedido(osv.Model):

    _name = 'pedido'
    _description = 'Informacion del pedido'
 
    _columns = {
           'identificador':fields.char('Id', size=10, required=True),
           'modelo':fields.char('Modelo', size=64, required=True, readonly=False),
           'importe':fields.float('importe', required=True),
           'empleado_id': fields.many2one('empleado', 'Empleado', required=True),
           'proveedor_id': fields.many2one('proveedor', 'Proveedor', required=True),
           'state':fields.selection([('solicitado', 'Solicitado'),('admitido', 'Admitido'), ('cancelado', 'Cancelado'),('enviado','Enviado')], 'Estados'),
        }
    _defaults = {'state':'solicitado'}