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

class devolucion(osv.Model):

    _name = 'devolucion'
    _description = 'Informacion de la devolucion'
 
    _columns = {
            'identificador':fields.char('Id', size=10, required=True),           
            'fecha_devolucion': fields.date('Fecha devolucion',required=True, autodate = True),
            'descripcion':fields.text('Descripcion'),
            'empleado_id': fields.many2one('empleado','Empleado', required=True),
            'autocaravana_id': fields.many2one('autocaravanas','Autocaravana', required=True),
            'cliente_id': fields.many2one('cliente','Cliente', required=True),
            'state':fields.selection([('solicitada', 'Solicitada'),('admitida', 'Admitida'), ('cancelada', 'Cancelada'),('devuelta','Devuelta')], 'Estados'),
        }
    _defaults = {'state':'solicitada'}
    
