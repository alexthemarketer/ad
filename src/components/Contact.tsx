import React from 'react';
import { motion } from 'framer-motion';
import { MapPin, Phone, Mail, Clock, Instagram, Facebook, MessageCircle } from 'lucide-react';

const Contact = () => {
  return (
    <section id="contact" className="py-20 bg-white">
      <div className="container mx-auto px-4 sm:px-6 lg:px-8">
        {/* Header */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8 }}
          viewport={{ once: true }}
          className="text-center mb-16"
        >
          <span className="text-gold-600 font-medium text-sm uppercase tracking-wider">Contato</span>
          <h2 className="font-serif text-4xl lg:text-5xl font-bold text-sage-800 mt-2 mb-6">
            Entre em
            <span className="block text-gold-600">Contato</span>
          </h2>
          <p className="text-lg text-sage-600 max-w-2xl mx-auto">
            Estamos aqui para esclarecer suas dúvidas e ajudá-la a escolher o melhor tratamento. 
            Entre em contato através dos canais abaixo.
          </p>
        </motion.div>

        <div className="grid lg:grid-cols-2 gap-16">
          {/* Contact Information */}
          <motion.div
            initial={{ opacity: 0, x: -30 }}
            whileInView={{ opacity: 1, x: 0 }}
            transition={{ duration: 0.8 }}
            viewport={{ once: true }}
            className="space-y-8"
          >
            {/* Address */}
            <div className="bg-gradient-to-br from-cream-50 to-sage-50 rounded-2xl p-8">
              <div className="flex items-start space-x-4">
                <div className="w-12 h-12 bg-gradient-to-br from-gold-400 to-gold-600 rounded-full flex items-center justify-center">
                  <MapPin className="text-white" size={24} />
                </div>
                <div>
                  <h3 className="font-serif text-xl font-semibold text-sage-800 mb-2">Localização</h3>
                  <p className="text-sage-600 leading-relaxed">
                    Rua das Flores, 123 - Jardins<br />
                    São Paulo - SP, 01234-567<br />
                    Próximo ao Shopping Iguatemi
                  </p>
                  <motion.button
                    className="mt-4 text-gold-600 hover:text-gold-700 font-medium text-sm transition-colors duration-200"
                    whileHover={{ x: 5 }}
                  >
                    Ver no Google Maps →
                  </motion.button>
                </div>
              </div>
            </div>

            {/* Phone */}
            <div className="bg-white rounded-2xl p-8 shadow-lg border border-cream-200">
              <div className="flex items-start space-x-4">
                <div className="w-12 h-12 bg-gradient-to-br from-sage-400 to-sage-600 rounded-full flex items-center justify-center">
                  <Phone className="text-white" size={24} />
                </div>
                <div>
                  <h3 className="font-serif text-xl font-semibold text-sage-800 mb-2">Telefone</h3>
                  <p className="text-sage-600 mb-2">(11) 9999-9999</p>
                  <p className="text-sm text-sage-500">
                    Atendimento de segunda a sexta, das 9h às 18h<br />
                    Sábados das 9h às 15h
                  </p>
                  <div className="flex space-x-3 mt-4">
                    <motion.button
                      className="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200 flex items-center space-x-2"
                      whileHover={{ scale: 1.05 }}
                      whileTap={{ scale: 0.95 }}
                    >
                      <MessageCircle size={16} />
                      <span>WhatsApp</span>
                    </motion.button>
                    <motion.button
                      className="border border-sage-300 hover:border-sage-400 text-sage-700 px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200"
                      whileHover={{ scale: 1.05 }}
                      whileTap={{ scale: 0.95 }}
                    >
                      Ligar Agora
                    </motion.button>
                  </div>
                </div>
              </div>
            </div>

            {/* Email */}
            <div className="bg-gradient-to-br from-gold-50 to-cream-50 rounded-2xl p-8">
              <div className="flex items-start space-x-4">
                <div className="w-12 h-12 bg-gradient-to-br from-gold-400 to-gold-600 rounded-full flex items-center justify-center">
                  <Mail className="text-white" size={24} />
                </div>
                <div>
                  <h3 className="font-serif text-xl font-semibold text-sage-800 mb-2">E-mail</h3>
                  <p className="text-sage-600 mb-2">contato@serenityclinic.com.br</p>
                  <p className="text-sm text-sage-500">
                    Resposta garantida em até 24 horas<br />
                    Para dúvidas, agendamentos e informações
                  </p>
                </div>
              </div>
            </div>

            {/* Business Hours */}
            <div className="bg-white rounded-2xl p-8 shadow-lg border border-cream-200">
              <div className="flex items-start space-x-4">
                <div className="w-12 h-12 bg-gradient-to-br from-sage-400 to-sage-600 rounded-full flex items-center justify-center">
                  <Clock className="text-white" size={24} />
                </div>
                <div>
                  <h3 className="font-serif text-xl font-semibold text-sage-800 mb-4">Horário de Funcionamento</h3>
                  <div className="space-y-2 text-sage-600">
                    <div className="flex justify-between">
                      <span>Segunda - Sexta:</span>
                      <span className="font-medium">9h às 18h</span>
                    </div>
                    <div className="flex justify-between">
                      <span>Sábado:</span>
                      <span className="font-medium">9h às 15h</span>
                    </div>
                    <div className="flex justify-between">
                      <span>Domingo:</span>
                      <span className="font-medium text-sage-400">Fechado</span>
                    </div>
                  </div>
                  <p className="text-sm text-sage-500 mt-4">
                    *Atendimento mediante agendamento prévio
                  </p>
                </div>
              </div>
            </div>
          </motion.div>

          {/* Map and Social Media */}
          <motion.div
            initial={{ opacity: 0, x: 30 }}
            whileInView={{ opacity: 1, x: 0 }}
            transition={{ duration: 0.8 }}
            viewport={{ once: true }}
            className="space-y-8"
          >
            {/* Map */}
            <div className="bg-white rounded-2xl overflow-hidden shadow-lg border border-cream-200">
              <div className="h-64 bg-gradient-to-br from-sage-100 to-cream-100 flex items-center justify-center">
                <div className="text-center">
                  <MapPin className="text-sage-400 mx-auto mb-4" size={48} />
                  <p className="text-sage-600 font-medium">Mapa Interativo</p>
                  <p className="text-sm text-sage-500">Rua das Flores, 123 - Jardins</p>
                </div>
              </div>
              <div className="p-6">
                <h3 className="font-serif text-xl font-semibold text-sage-800 mb-2">Como Chegar</h3>
                <p className="text-sage-600 text-sm leading-relaxed">
                  Localizada no coração dos Jardins, nossa clínica oferece fácil acesso por transporte público 
                  e estacionamento conveniado. A 2 minutos da estação Trianon-MASP.
                </p>
                <motion.button
                  className="mt-4 bg-gold-500 hover:bg-gold-600 text-white px-6 py-2 rounded-lg font-medium transition-colors duration-200"
                  whileHover={{ scale: 1.05 }}
                  whileTap={{ scale: 0.95 }}
                >
                  Abrir no Google Maps
                </motion.button>
              </div>
            </div>

            {/* Social Media */}
            <div className="bg-gradient-to-br from-sage-50 to-gold-50 rounded-2xl p-8">
              <h3 className="font-serif text-xl font-semibold text-sage-800 mb-6">Siga-nos nas Redes Sociais</h3>
              <div className="grid grid-cols-2 gap-4">
                <motion.a
                  href="#"
                  className="bg-white rounded-lg p-4 shadow-sm border border-cream-200 hover:shadow-md transition-all duration-200 flex items-center space-x-3"
                  whileHover={{ y: -2 }}
                >
                  <Instagram className="text-pink-500" size={24} />
                  <div>
                    <p className="font-medium text-sage-800">Instagram</p>
                    <p className="text-xs text-sage-500">@serenityclinic</p>
                  </div>
                </motion.a>
                <motion.a
                  href="#"
                  className="bg-white rounded-lg p-4 shadow-sm border border-cream-200 hover:shadow-md transition-all duration-200 flex items-center space-x-3"
                  whileHover={{ y: -2 }}
                >
                  <Facebook className="text-blue-500" size={24} />
                  <div>
                    <p className="font-medium text-sage-800">Facebook</p>
                    <p className="text-xs text-sage-500">Serenity Clinic</p>
                  </div>
                </motion.a>
              </div>
              <p className="text-sm text-sage-600 mt-4">
                Acompanhe nossas novidades, dicas de beleza e transformações incríveis dos nossos clientes.
              </p>
            </div>

            {/* FAQ Quick Links */}
            <div className="bg-white rounded-2xl p-8 shadow-lg border border-cream-200">
              <h3 className="font-serif text-xl font-semibold text-sage-800 mb-6">Perguntas Frequentes</h3>
              <div className="space-y-4">
                <div className="border-b border-cream-200 pb-3">
                  <h4 className="font-medium text-sage-800 mb-1">Preciso agendar com antecedência?</h4>
                  <p className="text-sm text-sage-600">Sim, recomendamos agendamento com 48h de antecedência.</p>
                </div>
                <div className="border-b border-cream-200 pb-3">
                  <h4 className="font-medium text-sage-800 mb-1">Vocês atendem convênios?</h4>
                  <p className="text-sm text-sage-600">Atendemos alguns convênios. Consulte nossa recepção.</p>
                </div>
                <div>
                  <h4 className="font-medium text-sage-800 mb-1">Posso remarcar minha consulta?</h4>
                  <p className="text-sm text-sage-600">Sim, com até 24h de antecedência sem custos.</p>
                </div>
              </div>
              <motion.button
                className="mt-6 text-gold-600 hover:text-gold-700 font-medium text-sm transition-colors duration-200"
                whileHover={{ x: 5 }}
              >
                Ver todas as perguntas →
              </motion.button>
            </div>
          </motion.div>
        </div>
      </div>
    </section>
  );
};

export default Contact;