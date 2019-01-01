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

class cliente(osv.Model):

    _name = 'cliente'
    _description = 'Informacion del cliente'
    def _ocupacionTotal(self, cr, uid, ids, field, arg, context=None):                    
        res = {} 
        for cliente in self.browse(cr, uid, ids, context=context):        
            res[cliente.id] = len(cliente.alquiler_ids)    
        return    res 
    
    
    
    _columns = {
            'name':fields.char('Nombre', size=64, required=True),
            'apellidos':fields.char('Apellidos', size=64, required=True),
            'dni':fields.char('DNI', size=9, required=True),
            'telefono':fields.integer('Telefono', size=9),
            'foto':fields.binary('foto'),
            'email':fields.char('Email', size=64, required=False),
            'ciudad': fields.char('Ciudad', size=64, required=True),
            'cp': fields.integer('Cp', size=10, required=True),     
            'alquiler_ids':fields.one2many('alquiler', 'cliente_id', 'Alquileres'),
            'devolucion_ids':fields.one2many('devolucion', 'cliente_id', 'Devolucion'),
            'ocupacion': fields.function(_ocupacionTotal, type='integer', string='Ocupacion total', store=True),
            
        }
    _sql_constraints = [ ('dni_uniq', 'unique (dni)', 'El dni ya existe'),  ]